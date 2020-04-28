<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;

class Department extends JsonResource
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
      'id'         => $this->id,
      'name'       => $this->name,
      'created_by' => $this->createdBy(),
      'manager'    => $this->manager(),
      'active'     => $this->active,
      'created_at' => $this->created_at,
      'update_at'  => $this->updated_at
    ];
  }

  /**
   * Get department creator
   */
  public function createdBy()
  {
    return [
      'name' => $this->departmentCreator->name
    ];
  }

  /**
   * Get department manager
   */
  public function manager()
  {
    return [
      'name'   => $this->departmentManager->name,
      'avatar' => avatar($this->departmentManager->avatar)
    ];
  }
}
