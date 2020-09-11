<?php

namespace App\Imports\Task;

use App\Models\Task;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TasksImport implements
ToModel,
WithStartRow,
SkipsOnError,
WithValidation,
SkipsOnFailure
{

  use Importable, SkipsErrors, SkipsFailures;

  protected $projectId;

  public function __construct($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    $user = User::where('username', $row[2])->first();
    $data = [
      'name'             => $row[1],
      'project_id'       => $this->projectId,
      'assigned_to'      => $user->id,
      'description'      => $row[3],
      'start_date'       => transformDate($row[4]),
      'due_on'           => transformDate($row[5]),
      'status_id'        => $row[6] === 'Done' ? 2 : 1,
      'percent_complete' => $row[7],
      'result'           => $row[8],
      'is_urgent'        => $row[9] === "Yes" ? 1 : 0,
      'is_important'     => $row[10] === "Yes" ? 1 : 0,
      'mark_star'        => $row[11] === "Yes" ? 1 : 0,
      'created_by'       => auth()->user()->id,
    ];
    return new Task($data);
  }

  /**
   * @return int
   */
  public function startRow(): int
  {
    return 2;
  }

  public function rules(): array
  {
    return [
      '*.1' => 'required'
    ];
  }

  public function customValidationAttributes(): array
  {
    return [
      '1' => 'name',
    ];
  }
}
