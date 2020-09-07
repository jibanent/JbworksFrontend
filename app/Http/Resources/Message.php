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
      'created_at' => $this->created_at,
      'sender'     => $this->sender(),
      'readers'    => $this->readers(),
    ];
  }

  public function sender()
  {
    return [
      'id'       => $this->sender->id,
      'name'     => $this->sender->name,
      'username' => $this->sender->username,
      'email'    => $this->sender->email,
      'phone'    => $this->sender->phone,
      'position' => $this->sender->position,
      'avatar'   => avatar($this->sender->avatar)
    ];
  }

  public function readers()
  {
    $readers = [];
    foreach ($this->readers as $reader) {
      array_push($readers, [
        'id'       => $reader->id,
        'name'     => $reader->name,
        'username' => $reader->username,
        'email'    => $reader->email,
        'phone'    => $reader->phone,
        'position' => $reader->position,
        'avatar'   => avatar($reader->avatar),
        'created_at' => $reader->created_at
      ]);
    }
    return $readers;
  }
}
