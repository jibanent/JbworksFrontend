<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;

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
      'id'           => $this->id,
      'name'         => $this->name,
      'description'  => $this->description,
      'start_date'   => $this->start_date,
      'finish_date'  => $this->finish_date,
      'active'       => $this->active,
      'created_at'   => $this->created_at,
      'updated_at'   => $this->updated_at,
      'department'   => $this->department->name,
      'status'       => $this->status(),
      'participants' => UserResource::collection($this->users)
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
