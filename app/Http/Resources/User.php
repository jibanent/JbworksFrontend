<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
      'username'   => $this->username,
      'email'      => $this->email,
      'phone'      => $this->phone,
      'birthday'   => $this->birthday,
      'address'    => $this->address,
      'position'   => $this->position,
      'avatar'     => avatar($this->avatar),
      'active'     => $this->active,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
      'department' => $this->department(),
      'role' => $this->getRoleNames()
    ];
  }

  public function department()
  {
    return [
      'id' => $this->department->id,
      'name' => $this->department->name,
      'manager' => [
        'name'     => $this->department->departmentManager->name,
        'email'    => $this->department->departmentManager->email,
        'phone'    => $this->department->departmentManager->phone,
        'position' => $this->department->departmentManager->position,
        'avatar'   => avatar($this->department->departmentManager->avatar)
      ]
    ];
  }
}
