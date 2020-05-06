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

  static public function countTasksByProject($projectId)
  {
    return Task::where('project_id', $projectId)->count();
  }

  static public function countTasksCompletedOnTimeByProject($projectId)
  {
    return Task::where('project_id', $projectId)
      ->where('status_id', 2)
      ->where('is_overdue', 0)
      ->where('late_completed', 0)
      ->count();
  }

  static public function countTasksCompletedOverdueByProject($projectId)
  {
    return Task::where('project_id', $projectId)
      ->where('status_id', 2)
      ->where('is_overdue', 1)
      ->where('late_completed', 1)
      ->count();
  }

  static public function countTasksProcessingByProject($projectId)
  {
    return Task::where('project_id', $projectId)
      ->where('status_id', 1)
      ->where('is_overdue', 0)
      ->where('late_completed', 0)
      ->count();
  }

  static public function countTasksProcessingOverdueByProject($projectId)
  {
    return Task::where('project_id', $projectId)
      ->where('status_id', 1)
      ->where('is_overdue', 1)
      ->where('late_completed', 0)
      ->count();
  }
}
