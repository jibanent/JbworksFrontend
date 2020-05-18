<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateTime;

class Task extends JsonResource
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
      'id'               => $this->id,
      'name'             => $this->name,
      'description'      => $this->description,
      'percent_complete' => $this->percent_complete,
      'result'           => $this->result,
      'start_date'       => $this->start_date,
      'due_on'           => $this->due_on,
      'diff_in_time'     => $this->diffInTime(),
      'is_overdue'       => $this->is_overdue,
      'late_completed'   => $this->late_completed,
      'status'           => $this->status(),
      'is_urgent'        => $this->is_urgent,
      'created_at'       => $this->created_at,
      'updated_at'       => $this->updated_at,
      'assigned_to'      => $this->assignedTo(),
      'created_by'       => $this->createdBy(),
      'project'          => $this->projectContainTask(),
    ];
  }

  /**
   * different between now and deadline time
   */
  public function diffInTime()
  {
    $dueOn = new DateTime($this->due_on);
    $now = new DateTime(Carbon::now());
    return $dueOn->diff($now);
  }

  /**
   * Get task status
   */
  public function status()
  {
    return [
      'name'      => $this->taskStatus->name,
      'slug'      => $this->taskStatus->slug,
      'color'     => $this->taskStatus->color
    ];
  }

  /**
   * Get user do this task
   */
  public function assignedTo()
  {
    return [
      'name'   => $this->userAssigned->name,
      'avatar' => avatar($this->userAssigned->avatar),
      'position' => $this->userAssigned->position
    ];
  }

  /**
   * Get user created this task
   */
  public function createdBy()
  {
    return [
      'name' => $this->userCreatedBy->name,
      'position' => $this->userCreatedBy->position,
      'avatar' => avatar($this->userCreatedBy->avatar)
    ];
  }

  /**
   * Get project contain task
   */
  public function projectContainTask()
  {
    return [
      'id' => $this->project->id,
      'name' => $this->project->name,
    ];
  }
}
