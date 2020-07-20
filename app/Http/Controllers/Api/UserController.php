<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\User as UserResource;
use App\Models\Project;
use App\Notifications\CreateUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Models\Department;

class UserController extends Controller
{
  protected $userRepository;
  protected $user;
  protected $department;

  public function __construct(UserRepositoryInterface $userRepository, User $user, Department $department)
  {
    $this->userRepository = $userRepository;
    $this->user = $user;
    $this->department = $department;
  }

  public function index(Request $request)
  {
    $search = $request->search;
    $users = $this->user->where('id', '<>', auth()->user()->id);
    if ($search !== null) $users = $users->search($search);
    $users = $users->orderBy('created_at', 'DESC')->paginated();
    $users = UserResource::collection($users);
    return $users;
  }

  public function getMyUsersByDepartment(Request $request)
  {
    $departmentId = auth()->user()->department_id;
    $search = $request->search;
    $departments = $this->department->with('subdepartments')->where('id', $departmentId)->first();
    $departmentIds = $this->department->getDepartmentsIds($departments);
    $users = $this->user->whereIn('department_id', $departmentIds)->where('id', '<>', auth()->user()->id);

    if ($search !== null) $users = $users->search($search);
    $users = $users->orderBy('created_at', 'DESC')->paginated();
    return UserResource::collection($users);
  }

  public function getUsersHasLeaderAndManagerRole(Request $request)
  {
    $search = $request->search;
    $users = User::whereHas('roles', function ($query) {
      $query->whereIn('name', ['leader', 'manager']);
    });
    if ($search !== null) $users = $users->search($search);
    $users = $users->orderBy('created_at', 'DESC')->paginated();
    return UserResource::collection($users);
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

      // $admins = User::all()->filter(function ($user) {
      //   return $user->hasRole('admin');
      // });

      // Notification::send($admins, new CreateUser($user));

      DB::commit();
      return response()->json([
        'status' => 'success',
        'message' => 'Thêm mới thành viên thành công!',
        'user' => new UserResource($user)
      ], 200);
    } catch (\Exception $exception) {
      DB::rollBack();
      throw $exception;
    }
  }

  public function updateMyProfile(Request $request)
  {
    $id = auth()->user()->id;
    // validate
    $userRequest = new UserRequest;
    $rule        = $userRequest->rules(true, $id);
    $validator   = Validator::make($request->all(), $rule);
    if ($validator->fails()) return response()->json($validator->errors(), 422);

    DB::beginTransaction();
    try {
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->position = $request->position;
      $user->birthday = $request->birthday;
      $user->phone = $request->phone;
      $user->address = $request->address;
      $user->avatar = $this->uploadMyAvatar($request, $id);

      $user->save();

      DB::commit();
      return response()->json([
        'status' => 'success',
        'mesage' => 'Chỉnh sửa thành viên thành công!',
        'user' => new UserResource($user)
      ], 200);
    } catch (\Exception $exception) {
      DB::rollBack();
      throw $exception;
    }
  }

  public function uploadMyAvatar(Request $request)
  {
    $id = auth()->user()->id;
    $filename = $this->moveAvatar($request->file('avatar'));
    $user = User::findOrFail($id);
    if ($filename !== null) {
      File::delete('images/avatar/' . $user->avatar);
    }
    return $filename ? $filename : $user->avatar;
  }

  private function moveAvatar($image)
  {
    if ($image) {
      $extension = $image->getClientOriginalExtension();
      $filename = uniqid() . '_' . time() . '.' . $extension;
      $image->move('images/avatar/', $filename);
      return $filename;
    }
  }

  public function destroy($id)
  {
    $this->userRepository->delete($id);
    return response()->json(['status' => 'success', 'message' => 'Xóa thành viên thành công'], 200);
  }

  public function changePassword(Request $request)
  {

    $passwordRequest = new PasswordRequest;
    $rule        = $passwordRequest->rules();
    $validator   = Validator::make($request->all(), $rule);
    if ($validator->fails()) return response()->json($validator->errors(), 422);

    $currentPassword = auth()->user()->password;
    $userId = auth()->user()->id;
    if (Hash::check($request->current_password, $currentPassword)) {
      $user = User::findOrFail($userId);
      $user->password = bcrypt($request->new_password);
      $user->save();
      return response()->json(['status' => 'success', 'message' => 'Đổi mật khẩu thành công!']);
    } else {
      return response()->json(['current_password' => ['Please enter correct current password']], 422);
    }
  }

  // public function myProfile()
  // {
  //   $user = auth()->user();
  //   $membership = User::where('department_id', $user->department->id)->count();
  //   return response()->json([
  //     'id'           => $user->id,
  //     'name'         => $user->name,
  //     'username'     => $user->username,
  //     'email'        => $user->email,
  //     'phone'        => $user->phone,
  //     'position'     => $user->position,
  //     'avatar'       => avatar($user->avatar),
  //     'created_at'   => $user->created_at,
  //     'birthday'     => $user->birthday,
  //     'address'      => $user->address,
  //     'department'   => [
  //       'id'         => $user->department->id,
  //       'name'       => $user->department->name,
  //       'membership' => $membership,
  //       'manager'    => [
  //         'id'       => $user->department->departmentManager->id,
  //         'name'     => $user->department->departmentManager->name
  //       ]
  //     ],
  //   ]);
  // }
}
