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

  public function getUsersBelongToProject(Request $request)
  {
    $project = Project::findOrFail($request->project);
    return response()->json([
      'status' => 'success',
      'users' => UserResource::collection($project->users)
    ], 200);
  }

  public function store(UserRequest $request)
  {
    DB::beginTransaction();
    try {
      $user = $this->userRepository->create($request->all());
      $user->assignRole($request->role_id);
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
      $user = $this->userRepository->update($id, $request->all());
      $user->syncRoles($request->role_id);
      DB::commit();
      return response()->json([
        'status' => 'success',
        'mesage' => 'Chỉnh sửa thành viên thành công!',
        'data' => $user
      ], 200);
    } catch (\Exception $exception) {
      DB::rollBack();
      throw $exception;
    }
  }

  public function destroy($id)
  {
    $this->userRepository->delete($id);
    return response()->json(['status' => 'success', 'message' => 'Xóa thành viên thành công'], 200);
  }
}
