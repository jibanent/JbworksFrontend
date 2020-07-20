<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Resources\Task as TaskResource;
use App\Models\Project;
use App\Models\User;
use App\Models\Department;
use App\Notifications\CreateTask;
use App\Notifications\UpdateTask;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
  protected $taskRepository;
  protected $department;
  protected $user;
  protected $task;

  public function __construct(TaskRepositoryInterface $taskRepository, Department $department, User $user, Task $task)
  {
    $this->taskRepository = $taskRepository;
    $this->department = $department;
    $this->user = $user;
    $this->task = $task;
  }

  public function getTasks(Request $request) {
    $order     = $request->order;
    $keyword   = $request->search;
    $status    = $request->status;
    $user      = $request->user;
    $tasks = $this->task;
    if ($keyword !== null) $tasks = $tasks->search($keyword);
    if ($status !== null) $tasks = $tasks->filterStatus($status);
    if ($user !== null) $tasks = $tasks->where('assigned_to', $user);
    $tasks = $tasks->ordered($order)->paginated();

    return  TaskResource::collection($tasks);
  }

  /**
   * Get my tasks
   */
  public function getMyTasks(Request $request)
  {
    $userId    = $request->user;
    $order     = $request->order;
    $keyword   = $request->search;
    $status    = $request->status;
    $projectId = $request->project;

    $myTasks = Task::where('assigned_to', $userId);

    if ($keyword !== null) $myTasks = $myTasks->search($keyword);
    if ($status !== null) $myTasks = $myTasks->filterStatus($status);
    if ($projectId !== null) $myTasks = $myTasks->where('project_id', $projectId);

    $myTasks = $myTasks->ordered($order)->paginated();

    return TaskResource::collection($myTasks);
  }

  /**
   * Get task belong to department that I managed
   */
  public function getTasksBelongToMyDepartment(Request $request)
  {
    $departmentId = auth()->user()->department_id;
    $order     = $request->order;
    $keyword   = $request->search;
    $status    = $request->status;
    $user      = $request->user;

    $departments = $this->department->with('subdepartments')->where('id', $departmentId)->first();
    $departmentsIds = $this->department->getDepartmentsIds($departments);
    $usersIds = $this->user->select('id')->whereIn('department_id', $departmentsIds)->where('id', '<>', auth()->user()->id)->get();
    $ids = [];
    foreach ($usersIds as $userId) {
      array_push($ids, $userId['id']);
    }
    $tasks = $this->task->whereIn('assigned_to', $ids);
    if ($keyword !== null) $tasks = $tasks->search($keyword);
    if ($status !== null) $tasks = $tasks->filterStatus($status);
    if ($user !== null) $tasks = $tasks->where('assigned_to', $user);

    $tasks = $tasks->ordered($order)->paginated();

    return  TaskResource::collection($tasks); // show tasks that user managed
  }

  public function getTasksByProject(Request $request, $projectId)
  {
    $order   = $request->order;
    $keyword = $request->search;
    $status  = $request->status;
    $start   = $request->start;
    $end     = $request->end;
    $tasks = Task::where('project_id', $projectId);

    if ($start !== null) $tasks = $tasks->whereDate('created_at', '>=', $start);
    if ($end !== null)  $tasks = $tasks->whereDate('created_at', '<=', $end);
    if ($keyword !== null) $tasks = $tasks->search($keyword);
    if ($status !== null) $tasks = $tasks->filterStatus($status);

    $tasks = $tasks->ordered($order)->paginated();
    return TaskResource::collection($tasks);
  }

  /**
   * count task (total and completed') by user
   */
  public function countTasksByUser(Request $request)
  {
    $totalTask = Task::where('assigned_to', $request->user)->count();
    $completedTask = Task::where('assigned_to', $request->user)->where('status_id', 2)->count();
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
      if ($task->status_id === 1) {
        $this->saveNotifications($task, 'doing');
      } else {
        $this->saveNotifications($task, 'done');
      }
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
      $oldAssignedTo = $task->assigned_to;
      $task->assigned_to = $request->assignedTo;
      $task->save();
      $this->saveNotifications($task, 'update_assigned_to'); // notify the recipient
      $user = User::findOrFail($oldAssignedTo);
      $user->notify(new UpdateTask($task, 'update_assigned_to')); // notify to old assigned_to

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
      $this->saveNotifications($task, 'update_result');
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
      $this->saveNotifications($task, 'update_name');
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
      $this->saveNotifications($task, 'update_deadline');
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
      $this->saveNotifications($task, 'update_start_time');
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
      if ($task->is_urgent) {
        $this->saveNotifications($task, 'urgent');
      } else {
        $this->saveNotifications($task, 'un_urgent');
      }
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
      if ($task->is_important) {
        $this->saveNotifications($task, 'important');
      } else {
        $this->saveNotifications($task, 'unimportant');
      }
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
      if ($task->mark_star) {
        $this->saveNotifications($task, 'mark_star');
      } else {
        $this->saveNotifications($task, 'un_mark_star');
      }
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
      $this->saveNotifications($task, 'update_description');
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

      $user = User::findOrFail($request->assigned_to);
      $user->notify(new CreateTask($task));

      return response()->json([
        'status' => 'success',
        'message' => 'Thêm mới công việc thành công!',
        'task' => new TaskResource($task)
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
      $this->saveNotifications($task, 'update_all');

      return response()->json([
        'status' => 'success',
        'message' => 'Task updated successfully!',
        'task'   => new TaskResource($task),
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  protected function saveNotifications($task, $type)
  {
    $project = Project::findOrFail($task->project_id);
    $manager = User::findOrFail($project->manager_id);
    $user    = User::findOrFail($task->assigned_to);

    if (auth()->user()->id !== $manager->id) {
      $manager->notify(new UpdateTask($task, $type));
    }
    if (auth()->user()->id !== $user->id) {
      $user->notify(new UpdateTask($task, $type));
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
