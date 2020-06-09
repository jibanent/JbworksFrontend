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
      'is_internal'           => $this->is_internal,
      'created_at'            => $this->created_at,
      'updated_at'            => $this->updated_at,
      'department'            => $this->department->name,
      'department_id'         => $this->department->id,
      'manager'               => $this->manager(),
      'open_status'           => $this->open_status,
      'close_status'          => $this->close_status,
      'participants'          => UserResource::collection($this->users),
      'stats'                 => $this->stats()
    ];
  }


  public function stats()
  {
    return [
      'total'     => TaskRepository::countTasksByProject($this->id),
      'completed_ontime' => TaskRepository::countTasksCompletedOnTimeByProject($this->id),
      'completed_late'   => TaskRepository::countTasksCompletedOverdueByProject($this->id),
      'processing'       => TaskRepository::countTasksProcessingByProject($this->id),
      'overdue'          => TaskRepository::countTasksProcessingOverdueByProject($this->id)

    ];
  }

  public function manager()
  {
    return [
      'id'       => $this->manager->id,
      'name'     => $this->manager->name,
      'position' => $this->manager->position,
      'email'    => $this->manager->email,
      'phone'    => $this->manager->phone,
      'avatar'   => avatar($this->manager->avatar)
    ];
  }
}
