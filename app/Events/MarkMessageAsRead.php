<?php

namespace App\Events;

use App\Http\Resources\Conversation as ResourcesConversation;
use App\Http\Resources\User as ResourcesUser;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MarkMessageAsRead implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $user;
  public $conversation;

  /**
   * Create a new event instance.
   *
   * @return void
   */
  public function __construct(User $user, Conversation $conversation)
  {
    $this->user = $user;
    $this->conversation = $conversation;
  }

  /**
   * Get the channels the event should broadcast on.
   *
   * @return \Illuminate\Broadcasting\Channel|array
   */
  public function broadcastOn()
  {
    $channels = [];
    foreach ($this->conversation->users as $user) {
      array_push($channels, new PrivateChannel('users.' . $user->id));
    }
    return $channels;
  }

  public function broadcastWith()
  {
    return [
      'conversation' => (new ResourcesConversation($this->conversation))->resolve(),
      'reader' => (new ResourcesUser($this->user))->resolve(),
    ];
  }
}
