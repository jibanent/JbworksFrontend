<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\BaseRepository;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
  public function __construct(Task $task)
  {
    parent::__construct($task);
  }

  static public function countOfTasksByProject($projectId)
  {
    return Task::where('project_id', $projectId)->count();
  }

  static public function countOfCompletedTaskByProject($projectId)
  {
    return Task::where('project_id', $projectId)
      ->where('status_id', 2)
      ->count();
  }

  static public function countOfOverdueTaskByProject($projectId)
  {
    return Task::where('project_id', $projectId)
      ->where('status_id', '!=', 2)
      ->where('is_overdue', 1)
      ->count();
  }
}
