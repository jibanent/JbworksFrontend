<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Repositories\Department\DepartmentRepositoryInterface;
use App\Http\Resources\Department as DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
  protected $departmentRepository;
  protected $department;

  public function __construct(DepartmentRepositoryInterface $departmentRepository, Department $department)
  {
    $this->departmentRepository = $departmentRepository;
    $this->department = $department;
  }

  /**
   * get all departments
   */
  public function index(Request $request)
  {
    $search = $request->search;
    $departments = $this->department;
    if ($search !== null) $departments = $departments->search($search);
    $departments = $departments->orderBy('created_at', 'DESC')->get();
    return DepartmentResource::collection($departments);
  }

  public function getMyDepartments(Request $request)
  {
    $department = $this->departmentRepository->where('manager_id', $request->manager)->get();
    return response()->json([
      'status' => 'success',
      'departments' => DepartmentResource::collection($department)
    ], 200);
  }

  public function store(DepartmentRequest $request)
  {
    try {
      $department = $this->departmentRepository->create($request->all());
      return response()->json([
        'status' => 'success',
        'message' => 'Thêm mới phòng ban thành công!',
        'data' => $department,
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function update(DepartmentRequest $request, $id)
  {
    try {
      $department = $this->departmentRepository->update($id, $request->all());
      return response()->json([
        'status' => 'success',
        'message' => 'Chỉnh sửa phòng ban thành công!',
        'data' => $department
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function destroy($id)
  {
    $this->departmentRepository->delete($id);
    return response()->json(['status' => 'success', 'message' => 'Xóa phòng ban thành công'], 200);
  }
}
