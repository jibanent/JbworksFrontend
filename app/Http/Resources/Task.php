<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;

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
      'id'          => $this->id,
      'name'        => $this->name,
      'description' => $this->description,
      'start_date'  => $this->start_date,
      'due_on'      => $this->due_on,
      'status'      => $this->status(),
      'created_at'  => $this->created_at,
      'updated_at'  => $this->updated_at,
      'assigned_to' => $this->assignedTo(),
      'created_by'  => $this->createdBy()
    ];
  }

  /**
   * Get task status
   */

  public function status()
  {
    return [
      'name'      => $this->taskStatus->name,
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
      'avatar' => avatar($this->userAssigned->avatar)
    ];
  }

  /**
   * Get user created this task
   */
  public function createdBy()
  {
    return [
      'name' => $this->userCreatedBy->name,
    ];
  }

}
