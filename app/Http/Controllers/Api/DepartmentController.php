<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\User;
use App\Repositories\Department\DepartmentRepositoryInterface;
use Illuminate\Http\Request;

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
    $departments = $this->departmentRepository->getAll();
    $rows = [];
    foreach ($departments as $key => $department) {
      $createdBy = User::select('id', 'name', 'email')->where('id', $department->created_by)->first();
      $manager   = User::select('id', 'name', 'email', 'avatar')->where('id', $department->manager_id)->first();

      $manager   = [
        "id"     => $manager->id,
        "name"   => $manager->name,
        "email"  => $manager->email,
        "avatar" => avatar($manager->avatar),
      ];
      $department = [
        "id"         => $department->id,
        "manager_id" => $department->manager_id,
        "manager"    => $manager,
        "name"       => $department->name,
        "active"     => $department->active,
        "created_by" => $createdBy,
        "created_at" => $department->created_at,
        "updated_at" => $department->updated_at,
      ];
      array_push($rows, $department);
    }
    return response()->json([
      'status' => 'success',
      'departments' => $rows
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
