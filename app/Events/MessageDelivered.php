<?php

namespace App\Events;

use App\Http\Resources\Conversation as ResourcesConversation;
use App\Http\Resources\Message as ResourcesMessage;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageDelivered implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $message;
  public $conversation;

  /**
   * Create a new event instance.
   *
   * @return void
   */
  public function __construct(Message $message, Conversation $conversation)
  {
    $this->message = $message;
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
      'message' => (new ResourcesMessage($this->message))->resolve(),
      'conversation' => (new ResourcesConversation($this->conversation))->resolve()
    ];
  }
}
