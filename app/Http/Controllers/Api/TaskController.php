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
use Illuminate\Support\Facades\Validator;

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
    })->values()->all();

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
    })->values()->all();

    return [
      'status' => 'success',
      'tasks' => $tasks,
      'stats'    => $this->countTaskByUser($managerId),
      'projects' => ProjectRepository::getMyActiveProjects($managerId)
    ];
  }

  public function getTasksByProject($project)
  {
    $data = TaskResource::collection(Task::where('project_id', $project)->get());
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
    })->values()->all();
    return [
      'status' => 'success',
      'tasks' => $tasks,
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

  /**
   * Update task status
   */
  public function updateStatus(Request $request, $id)
  {
    try {
      $task = $this->taskRepository->find($id);
      if ($request->status === 2) {
        $task->percent_complete = 100;
      }
      $task->status_id = $request->status;
      $task->save();
      return response()->json([
        'status' => 'success',
        'message' => 'Updated data successfully!',
        'task' => new TaskResource($task),
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function updateAssignedTo(Request $request, $id)
  {
    try {
      $task = $this->taskRepository->find($id);
      $task->assigned_to = $request->assignedTo;
      $task->save();
      return response()->json([
        'status' => 'success',
        'message' => 'Updated data successfully!',
        'task' => new TaskResource($task),
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function updateTaskResults(Request $request, $id)
  {
    try {
      $task = $this->taskRepository->find($id);
      $task->percent_complete = $request->percentComplete;
      $task->result = $request->result;
      $task->save();
      return response()->json([
        'status' => 'success',
        'message' => 'Updated data successfully!',
        'task' => new TaskResource($task),
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function updateTaskName(Request $request, $id)
  {
    try {
      $task = $this->taskRepository->find($id);
      $task->name = $request->name;
      $task->save();
      return response()->json([
        'status' => 'success',
        'message' => 'Updated data successfully!',
        'task' => new TaskResource($task),
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function updateTaskDeadline(Request $request, $id)
  {
    try {
      $task = $this->taskRepository->find($id);
      $task->due_on = $request->due_on;
      $task->save();
      return response()->json([
        'status' => 'success',
        'message' => 'Updated data successfully!',
        'task' => new TaskResource($task),
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function updateTaskStartTime(Request $request, $id)
  {
    try {
      $task = $this->taskRepository->find($id);
      $task->start_date = $request->start_date;
      $task->save();
      return response()->json([
        'status' => 'success',
        'message' => 'Updated data successfully!',
        'task' => new TaskResource($task),
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function toggleUrgent(Request $request, $id)
  {
    try {
      $task = $this->taskRepository->find($id);
      $task->is_urgent = $request->is_urgent;
      $task->save();
      return response()->json([
        'status' => 'success',
        'message' => 'Updated data successfully!',
        'task' => new TaskResource($task),
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function toggleImportant(Request $request, $id)
  {
    try {
      $task = $this->taskRepository->find($id);
      $task->is_important = $request->is_important;
      $task->save();
      return response()->json([
        'status' => 'success',
        'message' => 'Updated data successfully!',
        'task' => new TaskResource($task),
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function toggleMarkStar(Request $request, $id)
  {
    try {
      $task = $this->taskRepository->find($id);
      $task->mark_star = $request->mark_star;
      $task->save();
      return response()->json([
        'status' => 'success',
        'message' => 'Updated data successfully!',
        'task' => new TaskResource($task),
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function updateTaskDescription(Request $request, $id)
  {
    try {
      $task = $this->taskRepository->find($id);
      $task->description = $request->description;
      $task->save();
      return response()->json([
        'status' => 'success',
        'message' => 'Updated data successfully!',
        'task' => new TaskResource($task),
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function store(TaskRequest $request)
  {
    try {
      $task = $this->taskRepository->create($request->all());
      return response()->json([
        'status' => 'success',
        'message' => 'Thêm mới công việc thành công!',
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function update(Request $request, $id)
  {
    $taskRequest = new TaskRequest;
    $rule        = $taskRequest->rules(true);
    $validator   = Validator::make($request->all(), $rule);
    if ($validator->fails()) return response()->json($validator->errors(), 422);

    try {
      $task = $this->taskRepository->update($id, $request->all());
      return response()->json([
        'status' => 'success',
        'message' => 'Task updated successfully!',
        'task'   => new TaskResource($task),
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function destroy($id)
  {
    try {
      if ($this->taskRepository->delete($id)) {
        return response()->json([
          'status' => 'success',
          'message' => 'Deleted data successfully!',
        ]);
      }
    } catch (\Exception $exception) {
      throw $exception;
    }
  }
}
