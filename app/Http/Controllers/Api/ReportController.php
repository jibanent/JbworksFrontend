<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
  protected $project;
  protected $department;
  protected $task;
  protected $user;

  public function __construct(Project $project, Department $department, Task $task, User $user)
  {
    $this->project = $project;
    $this->department = $department;
    $this->task = $task;
    $this->user = $user;
  }

  public function countProject(Request $request)
  {
    $start      = $request->start; // 2020-1-1 || null
    $end        = $request->end; // 2020-1-1 || null
    $by         = $request->by; // started || deadline || null
    $department = $request->department; // departmentId || null

    $allProjects = $this->project->newQuery();

    $internalProjects = $this->project->isInternal();
    $onTrackProjects = $this->project->openStatus('on_track');
    $offTrackProjects = $this->project->openStatus('off_track');
    $atRiskProjects = $this->project->openStatus('at_risk');

    if (request()->has('start') && request()->has('end')) {
      if ($by === null || $by === 'created') {
        $allProjects->createdAt($start, $end);
        $internalProjects->createdAt($start, $end);
        $onTrackProjects->createdAt($start, $end);
        $offTrackProjects->createdAt($start, $end);
        $atRiskProjects->createdAt($start, $end);
      }

      if ($by === 'started') {
        $allProjects->startDate($start, $end);
        $internalProjects->startDate($start, $end);
        $onTrackProjects->startDate($start, $end);
        $offTrackProjects->startDate($start, $end);
        $atRiskProjects->startDate($start, $end);
      }

      if ($by === 'deadline') {
        $allProjects->deadline($start, $end);
        $internalProjects->deadline($start, $end);
        $onTrackProjects->deadline($start, $end);
        $offTrackProjects->deadline($start, $end);
        $atRiskProjects->deadline($start, $end);
      }
    }

    if (request()->has('department')) {
      $departments = $this->department->with('subdepartments')->where('id', $department)->first();
      $departmentsIds = $this->department->getDepartmentsIds($departments);

      $allProjects->whereIn('department_id', $departmentsIds);
      $internalProjects->whereIn('department_id', $departmentsIds);
      $onTrackProjects->whereIn('department_id', $departmentsIds);
      $offTrackProjects->whereIn('department_id', $departmentsIds);
      $atRiskProjects->whereIn('department_id', $departmentsIds);
    }

    return [
      'state' => 'success',
      'stats' => [
        'total' => $allProjects->count(),
        'internal' => $internalProjects->count(),
        'on_track' => $onTrackProjects->count(),
        'off_track' => $offTrackProjects->count(),
        'at_risk' => $atRiskProjects->count(),
      ]
    ];
  }

  public function countDepartment()
  {
    $allDepartments = $this->department;
    $activeDepartments = $this->department->where('active', 1);
    return [
      'status' => 'success',
      'stats' => [
        'total' => $allDepartments->count(),
        'active' => $activeDepartments->count()
      ]
    ];
  }

  public function countTask(Request $request)
  {
    $start      = $request->start; // 2020-1-1 || null
    $end        = $request->end; // 2020-1-1 || null
    $by         = $request->by; // started || deadline || null
    $department = $request->department; // departmentId || null

    $allTasks = $this->task->newQuery();
    $completedTasks = $this->task->done();
    $completedOntimeTask = $this->task->doneOnTime(); // completed + ontime
    $completedLate       = $this->task->doneLate(); // completed + overdue
    $processingTask      = $this->task->doing(); // processing
    $overdueTasks        = $this->task->overdue(); // processing + overdue
    $taskWithoutDeadline = $this->task->withoutDeadline();



    if (request()->has('start') && request()->has('end')) {
      if ($by === null || $by === 'created') {
        $allTasks->createdAt($start, $end);
        $completedTasks->createdAt($start, $end);
        $overdueTasks->createdAt($start, $end);
        $completedOntimeTask->createdAt($start, $end);
        $completedLate->createdAt($start, $end);
        $processingTask->createdAt($start, $end);
        $taskWithoutDeadline->createdAt($start, $end);
      }

      if ($by === 'started') {
        $allTasks->startDate($start, $end);
        $completedTasks->startDate($start, $end);
        $overdueTasks->startDate($start, $end);
        $completedOntimeTask->startDate($start, $end);
        $completedLate->startDate($start, $end);
        $processingTask->startDate($start, $end);
        $taskWithoutDeadline->startDate($start, $end);
      }

      if ($by === 'deadline') {
        $allTasks->dueOn($start, $end);
        $completedTasks->dueOn($start, $end);
        $overdueTasks->dueOn($start, $end);
        $completedOntimeTask->dueOn($start, $end);
        $completedLate->dueOn($start, $end);
        $processingTask->dueOn($start, $end);
        $taskWithoutDeadline->dueOn($start, $end);
      }
    }

    if (request()->has('department')) {

      $departments = $this->department->with('subdepartments')->where('id', $department)->first();
      $departmentsIds = $this->department->getDepartmentsIds($departments);
      $allTasks->whereHas(
        'project.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
      $completedTasks->whereHas(
        'project.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
      $overdueTasks->whereHas(
        'project.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
      $completedOntimeTask->whereHas(
        'project.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
      $completedLate->whereHas(
        'project.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
      $processingTask->whereHas(
        'project.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
      $taskWithoutDeadline->whereHas(
        'project.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
    }

    return [
      'status' => 'success',
      'stats' => [
        'total' => $allTasks->count(),
        'completed' => $completedTasks->count(),
        'overdue' => $overdueTasks->count(),
        'completed_ontime' => $completedOntimeTask->count(),
        'completed_late' => $completedLate->count(),
        'processing' => $processingTask->count(),
        'task_without_deadline' => $taskWithoutDeadline->count(),
      ]
    ];
  }

  public function countUser(Request $request)
  {
    $start      = $request->start; // 2020-1-1 || null
    $end        = $request->end; // 2020-1-1 || null
    $department = $request->department; // departmentId || null


    $allUsers = $this->user->newQuery();
    $activeUsers = $this->user->where('active', 1);

    if (request()->has('start') && request()->has('end')) {
      $allUsers->createdAt($start, $end);
      $activeUsers->createdAt($start, $end);
    }

    if (request()->has('department')) {
      $departments = $this->department->with('subdepartments')->where('id', $department)->first();
      $departmentsIds = $this->department->getDepartmentsIds($departments);
      $allUsers->whereIn('department_id', $departmentsIds);
      $activeUsers->whereIn('department_id', $departmentsIds);
    }

    return [
      'status' => 'success',
      'stats' => [
        'total' => $allUsers->count(),
        'active' => $activeUsers->count(),
      ]
    ];
  }

  public function getExcellentMember(Request $request)
  {
    $start      = $request->start; // 2020-1-1 || null
    $end        = $request->end; // 2020-1-1 || null
    $by         = $request->by; // started || deadline || null
    $department = $request->department; // departmentId || null

    $tasks = $this->task->newQuery();
    if (request()->has('start') && request()->has('end')) {
      if ($by === null || $by === 'created') {
        $tasks->createdAt($start, $end);
      }

      if ($by === 'started') {
        $tasks->startDate($start, $end);
      }

      if ($by === 'deadline') {
        $tasks->dueOn($start, $end);
      }
    }

    if (request()->has('department')) {
      $departments = $this->department->with('subdepartments')->where('id', $department)->first();
      $departmentsIds = $this->department->getDepartmentsIds($departments);
      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
    }

    $result = $tasks->get()->groupBy(function ($query) {
      return $query->assigned_to;
    })->take(5)->map(function ($task, $key) {
      $user = User::find($key);
      return [
        'assigned_to' => [
          'name' => $user->name,
          'email' => $user->email,
          'phone' => $user->phone,
          'position' => $user->position,
          'avatar' => avatar($user->avatar),
        ],
        'total' => $task->count(),
        'completed' => $task->where('status_id', 2)->count()
      ];
    })->sortBy('total')->sortBy('completed')->reverse()->values()->all();

    return [
      'status' => 'success',
      'excellent_member' => $result
    ];
  }

  public function taskStatisticsByMember(Request $request)
  {
    $start      = $request->start; // 2020-1-1 || null
    $end        = $request->end; // 2020-1-1 || null
    $by         = $request->by; // started || deadline || null
    $department = $request->department; // departmentId || null

    $tasks = $this->task->newQuery();
    if (request()->has('start') && request()->has('end')) {
      if ($by === null || $by === 'created') {
        $tasks->createdAt($start, $end);
      }

      if ($by === 'started') {
        $tasks->startDate($start, $end);
      }

      if ($by === 'deadline') {
        $tasks->dueOn($start, $end);
      }
    }

    if (request()->has('department')) {
      $departments = $this->department->with('subdepartments')->where('id', $department)->first();
      $departmentsIds = $this->department->getDepartmentsIds($departments);
      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
    }

    $result = $tasks->get()->groupBy(function ($query) {
      return $query->assigned_to;
    })->map(function ($task, $key) {
      $user = User::find($key);
      return [
        'assigned_to' => [
          'name'     => $user->name,
          'email'    => $user->email,
          'phone'    => $user->phone,
          'position' => $user->position,
          'avatar'   => avatar($user->avatar),
        ],
        'total'            => $task->count(),
        'completed_ontime' => $task->where('status_id', 2)->where('is_overdue', 0)->where('late_completed', 0)->count(), // completed + ontime
        'completed_late'   => $task->where('status_id', 2)->where('is_overdue', 1)->where('late_completed', 1)->count(), // completed + overdue
        'processing'       => $task->where('status_id', 1)->where('is_overdue', 0)->where('late_completed', 0)->count(), // processing
        'overdue'          => $task->where('status_id', 1)->where('is_overdue', 1)->where('late_completed', 0)->count() // processing + overdue
      ];
    })->sortBy('total')->reverse()->values()->all();

    return [
      'status' => 'success',
      'stats' => $result
    ];
  }

  public function getMostTasksAhead(Request $request)
  {
    $start      = $request->start; // 2020-1-1 || null
    $end        = $request->end; // 2020-1-1 || null
    $by         = $request->by; // started || deadline || null
    $department = $request->department; // departmentId || null

    $tasks = $this->task->newQuery();
    if (request()->has('start') && request()->has('end')) {
      if ($by === null || $by === 'created')  $tasks->createdAt($start, $end);
      if ($by === 'started')  $tasks->startDate($start, $end);
      if ($by === 'deadline')  $tasks->dueOn($start, $end);
    }

    if (request()->has('department')) {
      $departments = $this->department->with('subdepartments')->where('id', $department)->first();
      $departmentsIds = $this->department->getDepartmentsIds($departments);

      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
    }

    $result = $tasks->get()->groupBy(function ($query) {
      return $query->assigned_to;
    })->take(10)->map(function ($task, $key) {
      $user = User::find($key);
      return [
        'assigned_to' => [
          'name'     => $user->name,
          'email'    => $user->email,
          'phone'    => $user->phone,
          'position' => $user->position,
          'avatar'   => avatar($user->avatar),
        ],
        'total'            => $task->count(),
        'incomplete'  => $task->where('status_id', 1)->count()
      ];
    })->sortBy('incomplete')->reverse()->values()->all();

    return [
      'status' => 'success',
      'stats' => $result
    ];
  }

  public function getTopDelayed(Request $request)
  {

    $start      = $request->start; // 2020-1-1 || null
    $end        = $request->end; // 2020-1-1 || null
    $by         = $request->by; // started || deadline || null
    $department = $request->department; // departmentId || null

    $tasks = $this->task->newQuery();
    if (request()->has('start') && request()->has('end')) {
      if ($by === null || $by === 'created') $tasks->createdAt($start, $end);
      if ($by === 'started')  $tasks->startDate($start, $end);
      if ($by === 'deadline') $tasks->dueOn($start, $end);
    }

    if (request()->has('department')) {
      $departments = $this->department->with('subdepartments')->where('id', $department)->first();
      $departmentsIds = $this->department->getDepartmentsIds($departments);

      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
    }

    $result = $tasks->get()->groupBy(function ($query) {
      return $query->assigned_to;
    })->take(10)->map(function ($task, $key) {
      $user = User::find($key);
      return [
        'assigned_to' => [
          'name'     => $user->name,
          'email'    => $user->email,
          'phone'    => $user->phone,
          'position' => $user->position,
          'avatar'   => avatar($user->avatar),
        ],
        'total'            => $task->count(),
        'completed_late'   => $task->where('status_id', 2)->where('is_overdue', 1)->where('late_completed', 1)->count(), // completed + overdue
        'overdue'          => $task->where('status_id', 1)->where('is_overdue', 1)->where('late_completed', 0)->count(), // processing + overdue
      ];
    })->sortBy('completed_late')->sortBy('overdue')->reverse()->values()->all();

    return [
      'status' => 'success',
      'stats' => $result
    ];
  }

  public function taskStatisticsByProject(Request $request)
  {
    $start      = $request->start; // 2020-1-1 || null
    $end        = $request->end; // 2020-1-1 || null
    $by         = $request->by; // started || deadline || null
    $department = $request->department; // departmentId || null

    $tasks = $this->task->newQuery();
    if (request()->has('start') && request()->has('end')) {
      if ($by === null || $by === 'created')  $tasks->createdAt($start, $end);
      if ($by === 'started') $tasks->startDate($start, $end);
      if ($by === 'deadline')  $tasks->dueOn($start, $end);
    }

    if (request()->has('department')) {
      $departments = $this->department->with('subdepartments')->where('id', $department)->first();
      $departmentsIds = $this->department->getDepartmentsIds($departments);
      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
    }

    $result = $tasks->get()->groupBy(function ($query) {
      return $query->project_id;
    })->map(function ($task, $key) {
      $project = Project::find($key);
      return [
        'project' => [
          'id'     => $project->id,
          'name'     => $project->name,
          'description' => $project->description
        ],
        'total'            => $task->count(),
        'completed_ontime' => $task->where('status_id', 2)->where('is_overdue', 0)->where('late_completed', 0)->count(), // completed + ontime
        'completed_late'   => $task->where('status_id', 2)->where('is_overdue', 1)->where('late_completed', 1)->count(), // completed + overdue
        'processing'       => $task->where('status_id', 1)->where('is_overdue', 0)->where('late_completed', 0)->count(), // processing
        'overdue'          => $task->where('status_id', 1)->where('is_overdue', 1)->where('late_completed', 0)->count() // processing + overdue
      ];
    })->sortBy('total')->reverse()->values()->all();

    return [
      'status' => 'success',
      'stats' => $result
    ];
  }

  public function taskStatisticsByDepartment(Request $request)
  {
    $start      = $request->start; // 2020-1-1 || null
    $end        = $request->end; // 2020-1-1 || null
    $by         = $request->by; // started || deadline || null
    $department = $request->department; // departmentId || null

    $tasks = $this->task->newQuery();
    if (request()->has('start') && request()->has('end')) {
      if ($by === null || $by === 'created') $tasks->createdAt($start, $end);
      if ($by === 'started') $tasks->startDate($start, $end);
      if ($by === 'deadline')  $tasks->dueOn($start, $end);
    }

    if (request()->has('department')) {
      $departments = $this->department->with('subdepartments')->where('id', $department)->first();
      $departmentsIds = $this->department->getDepartmentsIds($departments);

      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
    }

    $result = $tasks->get()->groupBy(function ($query) {
      return $query->userAssigned->department_id;
    })->map(function ($task, $key) {
      $department = Department::find($key);
      return [
        'department' => [
          'name'     => $department->name,
        ],
        'total'            => $task->count(),
        'completed_ontime' => $task->where('status_id', 2)->where('is_overdue', 0)->where('late_completed', 0)->count(), // completed + ontime
        'completed_late'   => $task->where('status_id', 2)->where('is_overdue', 1)->where('late_completed', 1)->count(), // completed + overdue
        'processing'       => $task->where('status_id', 1)->where('is_overdue', 0)->where('late_completed', 0)->count(), // processing
        'overdue'          => $task->where('status_id', 1)->where('is_overdue', 1)->where('late_completed', 0)->count() // processing + overdue
      ];
    })->sortBy('total')->reverse()->values()->all();

    return [
      'status' => 'success',
      'stats' => $result
    ];
  }

  public function taskStatisticsByDate(Request $request)
  {
    $start      = $request->start; // 2020-1-1 || null
    $end        = $request->end; // 2020-1-1 || null
    $by         = $request->by; // started || deadline || null
    $department = $request->department; // departmentId || null

    $tasks = $this->task->newQuery();

    if (request()->has('start') && request()->has('end')) {
      if ($by === null || $by === 'created') $tasks->createdAt($start, $end);
      if ($by === 'started')  $tasks->startDate($start, $end);
      if ($by === 'deadline')  $tasks->dueOn($start, $end);
    }

    if (request()->has('department')) {
      $departments = $this->department->with('subdepartments')->where('id', $department)->first();
      $departmentsIds = $this->department->getDepartmentsIds($departments);

      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
    }

    $result = $tasks->get()->groupBy(function ($date) {
      return  Carbon::parse($date->created_at)->format('Y-m-d');
    })->map(function ($task, $key) {
      return [
        'date'             => $key,
        'total'            => $task->count(),
        'completed'        => $task->where('status_id', 2)->count(), // completed
        'processing'       => $task->where('status_id', 1)->where('is_overdue', 0)->where('late_completed', 0)->count(), // processing
        'overdue'          => $task->where('status_id', 1)->where('is_overdue', 1)->where('late_completed', 0)->count() // processing + overdue
      ];
    })->values()->all();

    return [
      'status' => 'success',
      'stats' => $result
    ];
  }

  public function taskStatisticsByWeek(Request $request)
  {
    $start      = $request->start; // 2020-1-1 || null
    $end        = $request->end; // 2020-1-1 || null
    $by         = $request->by; // started || deadline || null
    $department = $request->department; // departmentId || null

    $tasks = $this->task->newQuery();

    if (request()->has('start') && request()->has('end')) {
      if ($by === null || $by === 'created') $tasks->createdAt($start, $end);
      if ($by === 'started') $tasks->startDate($start, $end);
      if ($by === 'deadline')  $tasks->dueOn($start, $end);
    }

    if (request()->has('department')) {
      $departments = $this->department->with('subdepartments')->where('id', $department)->first();
      $departmentsIds = $this->department->getDepartmentsIds($departments);

      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($departmentsIds) {
          return $query->whereIn('department_id', $departmentsIds);
        }
      );
    }

    $result = $tasks->get()->groupBy(function ($date) {
      $startDate = Carbon::parse($date->created_at);
      return  $startDate->startOfWeek()->format('yy-m-d') . ' to ' . $startDate->endOfWeek()->format('yy-m-d');
    })->map(function ($task, $key) {
      $explode  =  explode(' to ', $key);
      return [
        'from'             => $explode[0],
        'to'               => $explode[1],
        'total'            => $task->count(),
        'completed'        => $task->where('status_id', 2)->count(),
        'processing'       => $task->where('status_id', 1)->where('is_overdue', 0)->where('late_completed', 0)->count(), // processing
        'overdue'          => $task->where('status_id', 1)->where('is_overdue', 1)->where('late_completed', 0)->count() // processing + overdue
      ];
    })->values()->all();

    return [
      'status' => 'success',
      'stats' => $result
    ];
  }
}
