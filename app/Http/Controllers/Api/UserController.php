<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\User as UserResource;
use App\Models\Project;
use App\Notifications\CreateUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
  protected $userRepository;

  public function __construct(UserRepositoryInterface $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function index()
  {
    $users = User::with(['department.departmentManager' => function ($query) {
      $query->select('id', 'name', 'email', 'phone', 'position', 'avatar');
    }])->get();

    $rows = [];
    foreach ($users as $user) {
      $rows[] = [
        "id"         => $user->id,
        "name"       => $user->name,
        "email"      => $user->email,
        "phone"      => $user->phone,
        "position"   => $user->position,
        "avatar"     => avatar($user->avatar),
        "active"     => $user->active,
        "created_at" => $user->created_at,
        "updated_at" => $user->updated_at,
        "department" => $this->department($user)
      ];
    }

    return response()->json([
      'status' => 'success',
      'users' => $rows,
    ], 200);
  }

  public function department($user)
  {
    return [
      'name'       => $user->department->name,
      'manager'    => [
        'name'     => $user->department->departmentManager->name,
        'email'    => $user->department->departmentManager->email,
        'phone'    => $user->department->departmentManager->phone,
        'position' => $user->department->departmentManager->position,
        'avatar'   => avatar($user->department->departmentManager->avatar)
      ]
    ];
  }

  public function getMyUsersByDepartment(Request $request)
  {
    $userId = $request->manager;
    $myUsers = User::whereHas(
      'department',
      function ($query) use ($userId) {
        $query->where('manager_id', $userId);
      }
    )->get();

    $users = UserResource::collection($myUsers);
    return response()->json([
      'status' => 'success',
      'users' => $users
    ], 200);
  }

  public function getProjectParticipants(Request $request)
  {
    $project = Project::findOrFail($request->project);
    return response()->json([
      'manager' => new UserResource($project->manager),
      'members' => UserResource::collection($project->users)
    ]);
  }

  public function store(UserRequest $request)
  {
    DB::beginTransaction();
    try {
      $user = $this->userRepository->create($request->all());
      $user->assignRole($request->role);

      $admins = User::all()->filter(function ($user) {
        return $user->hasRole('admin');
      });

      Notification::send($admins, new CreateUser($user));

      DB::commit();
      return response()->json([
        'status' => 'success',
        'message' => 'Thêm mới thành viên thành công!',
        'data' => $user
      ], 200);
    } catch (\Exception $exception) {
      DB::rollBack();
      throw $exception;
    }
  }

  public function update(Request $request, $id)
  {
    // validate
    $userRequest = new UserRequest;
    $rule        = $userRequest->rules(true, $id);
    $validator   = Validator::make($request->all(), $rule);
    if ($validator->fails()) return $validator->errors();

    DB::beginTransaction();
    try {
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->username = $request->username;
      $user->position = $request->position;
      $user->birthday = $request->birthday;
      $user->phone = $request->phone;
      $user->address = $request->address;
      $user->save();
      $this->uploadAvatar($request, $id);
      DB::commit();
      return response()->json([
        'status' => 'success',
        'mesage' => 'Chỉnh sửa thành viên thành công!',
        'data' => new UserResource($user)
      ], 200);
    } catch (\Exception $exception) {
      DB::rollBack();
      throw $exception;
    }
  }

  public function uploadAvatar(Request $request, $id)
  {
    $filename = $this->moveAvatar($request->file('avatar'));
    $user = User::findOrFail($id);
    File::delete('images/avatar/' . $user->avatar);
    $user->avatar = $filename;
    $user->save();
    return $user;
  }

  private function moveAvatar($image)
  {
    $extension = $image->getClientOriginalExtension();
    $filename = uniqid() . '_' . time() . '.' . $extension;
    if ($image) {
      $image->move('images/avatar/', $filename);
    }
    return $filename;
  }

  public function destroy($id)
  {
    $this->userRepository->delete($id);
    return response()->json(['status' => 'success', 'message' => 'Xóa thành viên thành công'], 200);
  }

  public function myProfile()
  {
    $user = auth()->user();
    $membership = User::where('department_id', $user->department->id)->count();
    return response()->json([
      'id'           => $user->id,
      'name'         => $user->name,
      'username'     => $user->username,
      'email'        => $user->email,
      'phone'        => $user->phone,
      'position'     => $user->position,
      'avatar'       => avatar($user->avatar),
      'created_at'   => $user->created_at,
      'birthday'     => $user->birthday,
      'address'      => $user->address,
      'department'   => [
        'id'         => $user->department->id,
        'name'       => $user->department->name,
        'membership' => $membership,
        'manager'    => [
          'id'       => $user->department->departmentManager->id,
          'name'     => $user->department->departmentManager->name
        ]
      ],
    ]);
  }
}
