<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Conversation extends JsonResource
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
      'id'              => $this->id,
      'name'            => $this->name ? $this->name : $this->users()[1]['name'],
      'creator'         => $this->creator(),
      'users'           => $this->users(),
      'latest_messages' => $this->messages->last()
    ];
  }

  /**
   * User created the conversation
   */
  public function creator()
  {
    return [
      'id'       => $this->creator->id,
      'name'     => $this->creator->name,
      'username' => $this->creator->username,
      'email'    => $this->creator->email,
      'avatar'   => avatar($this->creator->avatar)
    ];
  }

  /**
   * users joined to conversation
   */
  public function users()
  {
    $users = [];
    foreach ($this->users as $user) {
      array_push($users, [
        'id'       => $user->id,
        'name'     => $user->name,
        'username' => $user->username,
        'email'    => $user->email,
        'phone'    => $user->phone,
        'position' => $user->position,
        'avatar'   => avatar($user->avatar)
      ]);
    }
    return $users;
  }
}
