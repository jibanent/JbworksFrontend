<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  protected $taskRepository;

  public function __construct(TaskRepositoryInterface $taskRepository)
  {
    $this->taskRepository = $taskRepository;
  }

  public function getTaskByUserAssigned($assignedTo)
  {
    $tasks = Task::where('assigned_to', $assignedTo)->get();

    $rows = [];
    foreach ($tasks as $task) {
      $task = [
        'id'          => $task->id,
        "project_id"  => $task->project_id,
        "assigned_to" => $task->assigned_to,
        "name"        => $task->name,
        "description" => $task->description,
        "due_on"      => $task->due_on,
        "status_id"   => $task->status_id,
        "created_at"  => $task->created_at,
        "updated_at"  => $task->updated_at,
        "status"      => $task->taskStatus->name,
        "project"     => $task->project->name,
      ];

      array_push($rows, $task);
    }
    return [
      'status' => 'success',
      'data' => $rows
    ];
  }

  public function store(TaskRequest $request)
  {
    try {
      $task = $this->taskRepository->create($request->all());
      return response()->json([
        'status' => 'success',
        'mesage' => 'Thêm mới công việc thành công!',
        'data' => $task,
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function update(TaskRequest $request, $id)
  {
    try {
      $task = $this->taskRepository->update($id, $request->all());
      return response()->json([
        'status' => 'success',
        'mesage' => 'Chỉnh sửa công việc thành công!',
        'data'   => $task
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }
}
