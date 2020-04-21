<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    $internalProjects = $this->project->where('is_internal', 1);
    $onTrackProjects = $this->project->where('status_id', 1);
    $offTrackProjects = $this->project->where('status_id', 2);
    $atRiskProjects = $this->project->where('status_id', 3);

    if (request()->has('start') && request()->has('end')) {
      if ($by === null || $by === 'created') {
        $allProjects->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
        $internalProjects->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
        $onTrackProjects->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
        $offTrackProjects->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
        $atRiskProjects->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
      }

      if ($by === 'started') {
        $allProjects->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
        $internalProjects->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
        $onTrackProjects->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
        $offTrackProjects->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
        $atRiskProjects->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
      }

      if ($by === 'deadline') {
        $allProjects->whereDate('finish_date', '>=', $start)->whereDate('finish_date', '<=', $end);
        $internalProjects->whereDate('finish_date', '>=', $start)->whereDate('finish_date', '<=', $end);
        $onTrackProjects->whereDate('finish_date', '>=', $start)->whereDate('finish_date', '<=', $end);
        $offTrackProjects->whereDate('finish_date', '>=', $start)->whereDate('finish_date', '<=', $end);
        $atRiskProjects->whereDate('finish_date', '>=', $start)->whereDate('finish_date', '<=', $end);
      }
    }

    if (request()->has('department')) {
      $allProjects->where('department_id', $department);
      $internalProjects->where('department_id', $department);
      $onTrackProjects->where('department_id', $department);
      $offTrackProjects->where('department_id', $department);
      $atRiskProjects->where('department_id', $department);
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
    $completedTasks = $this->task->where('status_id', 2);

    $completedOntimeTask = $this->task->where('status_id', 2)->where('is_overdue', 0)->where('late_completed', 0); // completed + ontime
    $completedLate       = $this->task->where('status_id', 2)->where('is_overdue', 1)->where('late_completed', 1); // completed + overdue
    $processingTask      = $this->task->where('status_id', 1)->where('is_overdue', 0)->where('late_completed', 0); // processing
    $overdueTasks        = $this->task->where('status_id', 1)->where('is_overdue', 1)->where('late_completed', 0); // processing + overdue
    $taskWithoutDeadline = $this->task->where('due_on', null);



    if (request()->has('start') && request()->has('end')) {
      if ($by === null || $by === 'created') {
        $allTasks->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
        $completedTasks->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
        $overdueTasks->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
        $completedOntimeTask->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
        $completedLate->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
        $processingTask->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
        $taskWithoutDeadline->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
      }

      if ($by === 'started') {
        $allTasks->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
        $completedTasks->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
        $overdueTasks->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
        $completedOntimeTask->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
        $completedLate->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
        $processingTask->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
        $taskWithoutDeadline->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
      }

      if ($by === 'deadline') {
        $allTasks->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
        $completedTasks->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
        $overdueTasks->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
        $completedOntimeTask->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
        $completedLate->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
        $processingTask->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
        $taskWithoutDeadline->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
      }
    }

    if (request()->has('department')) {
      $allTasks->whereHas(
        'project.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
        }
      );
      $completedTasks->whereHas(
        'project.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
        }
      );
      $overdueTasks->whereHas(
        'project.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
        }
      );
      $completedOntimeTask->whereHas(
        'project.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
        }
      );
      $completedLate->whereHas(
        'project.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
        }
      );
      $processingTask->whereHas(
        'project.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
        }
      );
      $taskWithoutDeadline->whereHas(
        'project.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
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
      $allUsers->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
      $activeUsers->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
    }

    if (request()->has('department')) {
      $allUsers->where('department_id', $department);
      $activeUsers->where('department_id', $department);
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
        $tasks->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
      }

      if ($by === 'started') {
        $tasks->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
      }

      if ($by === 'deadline') {
        $tasks->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
      }
    }

    if (request()->has('department')) {
      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
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
        $tasks->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
      }

      if ($by === 'started') {
        $tasks->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
      }

      if ($by === 'deadline') {
        $tasks->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
      }
    }

    if (request()->has('department')) {
      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
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
      if ($by === null || $by === 'created') {
        $tasks->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
      }

      if ($by === 'started') {
        $tasks->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
      }

      if ($by === 'deadline') {
        $tasks->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
      }
    }

    if (request()->has('department')) {
      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
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
      if ($by === null || $by === 'created') {
        $tasks->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
      }

      if ($by === 'started') {
        $tasks->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
      }

      if ($by === 'deadline') {
        $tasks->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
      }
    }

    if (request()->has('department')) {
      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
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
      if ($by === null || $by === 'created') {
        $tasks->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
      }

      if ($by === 'started') {
        $tasks->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
      }

      if ($by === 'deadline') {
        $tasks->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
      }
    }

    if (request()->has('department')) {
      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
        }
      );
    }

    $result = $tasks->get()->groupBy(function ($query) {
      return $query->project_id;
    })->map(function ($task, $key) {
      $project = Project::find($key);
      return [
        'project' => [
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
      if ($by === null || $by === 'created') {
        $tasks->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
      }

      if ($by === 'started') {
        $tasks->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
      }

      if ($by === 'deadline') {
        $tasks->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
      }
    }

    if (request()->has('department')) {
      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
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
      if ($by === null || $by === 'created') {
        $tasks->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
      }

      if ($by === 'started') {
        $tasks->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
      }

      if ($by === 'deadline') {
        $tasks->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
      }
    }

    if (request()->has('department')) {
      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
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
      if ($by === null || $by === 'created') {
        $tasks->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
      }

      if ($by === 'started') {
        $tasks->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
      }

      if ($by === 'deadline') {
        $tasks->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
      }
    }

    if (request()->has('department')) {
      $tasks->whereHas(
        'userAssigned.department',
        function ($query) use ($department) {
          return $query->where('department_id', $department);
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
