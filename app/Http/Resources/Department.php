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
      'parent_id'  => $this->parent_id,
      'name'       => $this->name,
      'created_by' => $this->createdBy(),
      'manager'    => $this->manager(),
      'active'     => $this->active,
      'created_at' => $this->created_at,
      'update_at'  => $this->updated_at,
      'children'   => self::collection($this->whenLoaded('children'))
    ];
  }

  /**
   * Get department creator
   */
  public function createdBy()
  {
    return [
      'id' => $this->departmentCreator ? $this->departmentCreator->id : null,
      'name' => $this->departmentCreator ? $this->departmentCreator->name : null
    ];
  }

  /**
   * Get department manager
   */
  public function manager()
  {
    return [
      'id'     => $this->departmentManager->id,
      'name'   => $this->departmentManager->name,
      'avatar' => avatar($this->departmentManager->avatar)
    ];
  }
}
