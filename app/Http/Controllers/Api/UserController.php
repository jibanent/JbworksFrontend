<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  protected $userRepository;

  public function __construct(UserRepositoryInterface $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function index()
  {
    $users = $this->userRepository->getAll();
    $listUsers = [];
    foreach ($users as $user) {
      $user = [
        "id"         => $user->id,
        "name"       => $user->name,
        "email"      => $user->email,
        "phone"      => $user->phone,
        "position"   => $user->position,
        "avatar"     => $user->avatar ? request()->root() . '/images/avatar/' . $user->avatar : null,
        "active"     => $user->active,
        "department" => $user->department->name,
        "created_at" => $user->created_at,
        "updated_at" => $user->updated_at,
      ];

      array_push($listUsers, $user);
    }
    return response()->json(['status' => 'success', 'users' => $listUsers], 200);
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
        'mesage' => 'Thêm mới thành viên thành công!',
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
