<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Resources\Task as TaskResource;
use Carbon\Carbon;
use App\Repositories\Project\ProjectRepository;

class TaskController extends Controller
{
  protected $taskRepository;

  public function __construct(TaskRepositoryInterface $taskRepository)
  {
    $this->taskRepository = $taskRepository;
  }

  /**
   * Get my tasks
   */
  public function getMyTasks(Request $request)
  {
    $userId = $request->user;
    $tasksOfCurrentUser = Task::where('assigned_to', $userId)->get();
    $data = TaskResource::collection($tasksOfCurrentUser);

    $tasks = $data->groupBy(function ($date) {
      $startDate = Carbon::parse($date->start_date);
      return  $startDate->startOfWeek()->format('yy-m-d') . ' to ' . $startDate->endOfWeek()->format('yy-m-d');
    })->reverse()->map(function ($task, $key) {
      $explode  =  explode(' to ', $key);
      return [
        'from' => $explode[0],
        'to' => $explode[1],
        'value' => $task
      ];
    });

    return [
      'status'   => 'success',
      'tasks'    => $tasks,
      'stats'    => $this->countTaskByUser($userId),
      'projects' => ProjectRepository::getMyActiveProjects($userId)
    ];
  }

  /**
   * Get task belong to department that I managed
   */
  public function getTasksBelongToMyDepartment(Request $request)
  {
    $managerId = $request->manager;
    $tasksOfManager = Task::whereHas(
      'userAssigned.department',
      function ($query) use ($managerId) {
        return $query->where('manager_id', $managerId);
      }
    )->get();
    $data = TaskResource::collection($tasksOfManager); // show tasks that user managed

    $tasks = $data->groupBy(function ($date) {
      $startDate = Carbon::parse($date->start_date);
      return  $startDate->startOfWeek()->format('yy-m-d') . ' to ' . $startDate->endOfWeek()->format('yy-m-d');
    })->reverse()->map(function ($task, $key) {
      $explode  =  explode(' to ', $key);
      return [
        'from' => $explode[0],
        'to' => $explode[1],
        'value' => $task
      ];
    });

    return [
      'status' => 'success',
      'tasks' => $tasks
    ];
  }

  /**
   * count task (total and completed') by user
   */
  public function countTaskByUser($userId)
  {
    $totalTask = Task::where('assigned_to', $userId)->count();
    $completedTask = Task::where('assigned_to', $userId)->where('status_id', 2)->count();
    return [
      'total_task' => $totalTask,
      'completed_task' => $completedTask
    ];
  }
  /**
   * Get task detail by id
   */
  public function show($id)
  {
    $task = new TaskResource($this->taskRepository->find($id));
    return [
      'status' => 'success',
      'task' => $task
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
