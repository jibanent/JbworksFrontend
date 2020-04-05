<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\User;
use App\Repositories\Department\DepartmentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Department as DepartmentResource;

class DepartmentController extends Controller
{
  protected $departmentRepository;

  public function __construct(DepartmentRepositoryInterface $departmentRepository)
  {
    $this->departmentRepository = $departmentRepository;
  }

  /**
   * get all departments
   */
  public function index()
  {
    $departments = DepartmentResource::collection($this->departmentRepository->getAll());

    return response()->json([
      'status' => 'success',
      'departments' => $departments
    ], 200);
  }

  public function store(DepartmentRequest $request)
  {
    try {
      $department = $this->departmentRepository->create($request->all());
      return response()->json([
        'status' => 'success',
        'mesage' => 'Thêm mới phòng ban thành công!',
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
        'mesage' => 'Chỉnh sửa phòng ban thành công!',
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
