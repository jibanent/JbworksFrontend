<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Repositories\Department\DepartmentRepositoryInterface;
use App\Http\Resources\Department as DepartmentResource;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
  protected $departmentRepository;
  protected $department;
  protected $user;

  public function __construct(DepartmentRepositoryInterface $departmentRepository, Department $department, User $user)
  {
    $this->departmentRepository = $departmentRepository;
    $this->department = $department;
    $this->user = $user;
  }

  /**
   * get all departments
   */
  public function index(Request $request)
  {
    $search = $request->search;
    $departments = $this->department->where('parent_id', 0);
    if ($search !== null) $departments = $departments->search($search);
    $departments = $departments->orderBy('created_at', 'DESC')->paginated();
    return DepartmentResource::collection($departments);
  }

  public function getMyDepartments()
  {
    $userId = auth()->user()->id;
    $departments = $this->department->where('manager_id', $userId)
      ->with('subdepartments')
      ->orderBy('created_at', 'DESC')
      ->paginated();;
    return DepartmentResource::collection($departments);
  }

  public function show($id)
  {
    $department = $this->department->findOrFail($id);
    return new DepartmentResource($department);
  }

  public function store(DepartmentRequest $request)
  {
    try {
      $department = $this->departmentRepository->create($request->all());
      return response()->json([
        'status' => 'success',
        'message' => 'Thêm mới phòng ban thành công!',
        'data' => new DepartmentResource($department),
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function update(Request $request, $id)
  {
    $departmentRequest = new DepartmentRequest;
    $rule        = $departmentRequest->rules(true, $id);
    $validator   = Validator::make($request->all(), $rule);
    if ($validator->fails()) return response()->json($validator->errors(), 422);
    try {
      $department = $this->departmentRepository->update($id, $request->all());
      return response()->json([
        'status' => 'success',
        'message' => 'Chỉnh sửa phòng ban thành công!',
        'data' => new DepartmentResource($department)
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function updateParentId(Request $request, $id)
  {
    try {
      $department = $this->departmentRepository->find($id);
      $department->parent_id = $request->parent_id;
      $department->save();
      return response()->json([
        'status' => 'success',
        'data' => new DepartmentResource($department)
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function destroy($id)
  {
    $users = $this->user->where('department_id', $id)->get();
    $roles = [];
    foreach ($users as $user) {
      array_push($roles, $user->getRoleNames()->first());
    }
    if (in_array('admin', $roles)) {
      return response()->json(['status' => 'warning', 'message' => 'Không được phép xóa phòng ban này!'], 200);
    }
    $this->departmentRepository->delete($id);
    return response()->json(['status' => 'success', 'message' => 'Xóa phòng ban thành công'], 200);
  }
}
