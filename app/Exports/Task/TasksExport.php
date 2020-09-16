<?php

namespace App\Exports\Task;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TasksExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{

  use Exportable;

  protected $projectId;
  protected $from;
  protected $to;

  function __construct($projectId, $from, $to)
  {
    $this->projectId = $projectId;
    $this->from = $from;
    $this->to = $to;
  }

  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    $task = Task::with('userAssigned', 'userCreatedBy')
      ->where('project_id', $this->projectId)
      ->createdAt($this->from, $this->to)
      ->get();
    return $task;
  }

  public function map($task): array
  {
    $status = '';
    if ($task->status_id == 2 && $task->is_overdue == 0 && $task->late_completed == 0) $status = 'Done';
    if ($task->status_id == 2 && $task->is_overdue == 1 && $task->late_completed == 1) $status = 'Late completed';
    if ($task->status_id == 1 && $task->is_overdue == 0 && $task->late_completed == 0) $status = 'Doing';
    if ($task->status_id == 1 && $task->is_overdue == 1 && $task->late_completed == 0) $status = 'Overdue';

    return [
      $task->name,
      $task->userCreatedBy->name,
      $task->userAssigned->name,
      $task->description,
      $task->start_date,
      $task->due_on,
      $task->completed_date,
      $task->percent_completed,
      $task->result,
      $status,
      $task->is_urgent === 1 ? 'Yes' : 'No',
      $task->created_at,
    ];
  }

  public function headings(): array
  {
    return [
      'Name',
      'Creator',
      'Assigned to',
      'Description',
      'Start date',
      'Due on',
      'Completed date',
      'Percent completed',
      'Result',
      'Status',
      'Urgent',
      'Created at',
    ];
  }
}
