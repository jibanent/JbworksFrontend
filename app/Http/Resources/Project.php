<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;
use App\Models\Task;
use App\Repositories\Task\TaskRepository;

class Project extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    return [
      'id'                    => $this->id,
      'name'                  => $this->name,
      'description'           => $this->description,
      'start_date'            => $this->start_date,
      'finish_date'           => $this->finish_date,
      'active'                => $this->active,
      'created_at'            => $this->created_at,
      'updated_at'            => $this->updated_at,
      'department'            => $this->department->name,
      'status'                => $this->status(),
      'participants'          => UserResource::collection($this->users),
      'stats'                 => $this->stats()
    ];
  }


  public function stats()
  {
    return [
      'total_task'     => TaskRepository::countOfTasksByProject($this->id),
      'completed_task' => TaskRepository::countOfCompletedTaskByProject($this->id),
      'overdue_task'   => TaskRepository::countOfOverdueTaskByProject($this->id)
    ];
  }

  /**
   * return project status
   */
  public function status()
  {
    return [
      'name'       => $this->projectStatus->name,
      'color'      => $this->projectStatus->color
    ];
  }
}
