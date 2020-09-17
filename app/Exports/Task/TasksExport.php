<?php

namespace App\Exports\Task;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TasksExport implements
  ShouldAutoSize,
  WithMapping,
  WithHeadings,
  WithEvents,
  WithColumnFormatting,
  FromQuery
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

  public function query()
  {
    return Task::query()->with('userAssigned', 'userCreatedBy')
      ->where('project_id', $this->projectId)
      ->createdAt($this->from, $this->to);
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
      $task->percent_complete,
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
      'Percent complete (%)',
      'Result',
      'Status',
      'Urgent',
      'Created at',
    ];
  }

  public function registerEvents(): array
  {
    return [
      AfterSheet::class => function (AfterSheet $event) {
        $event->sheet->getStyle('A1:L1')->applyFromArray([
          'font' => [
            'bold' => true,
          ],
          'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
          ],
        ]);
      }
    ];
  }

  public function columnFormats(): array
  {
    return [
      'E' => NumberFormat::FORMAT_TEXT,
      'F' => NumberFormat::FORMAT_TEXT,
      'L' => NumberFormat::FORMAT_TEXT,
    ];
  }
}
