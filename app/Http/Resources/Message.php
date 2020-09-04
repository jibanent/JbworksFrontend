<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Message extends JsonResource
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
      'message'    => $this->message,
      'read_at'    => $this->read_at,
      'created_at' => $this->created_at,
      'sender'     => $this->sender()
    ];
  }

  public function sender()
  {
    return [
      'id'     => $this->sender->id,
      'name'   => $this->sender->name,
      'username' => $this->sender->username,
      'email' => $this->sender->email,
      'phone' => $this->sender->phone,
      'position' => $this->sender->position,
      'avatar' => avatar($this->sender->avatar)
    ];
  }
}
