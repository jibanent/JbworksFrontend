<?php

namespace App\Notifications;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateTask extends Notification
{
  use Queueable;

  protected $task;
  protected $type;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct(Task $task, $type)
  {
    $this->task = $task;
    $this->type = $type;
  }

  /**
   * Get the notification's delivery channels.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function via($notifiable)
  {
    return ['database'];
  }

  /**
   * Get the array representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function toArray($notifiable)
  {
    // dd($this->type);
    $user = auth()->user();
    return [
      'task'     => [
        'id'         => $this->task->id,
        'name'       => $this->task->name,
        'assigned_to' => [
          'id'        => $this->task->userAssigned->id,
          'name'      => $this->task->userAssigned->name
        ],
        'project'    => [
          'id'       => $this->task->project->id,
          'name'     => $this->task->project->name,
        ],
        'updated_by' => [
          'id'       => $user->id,
          'name'     => $user->name,
          'avatar'   => avatar($user->avatar),
        ],
        'updated_at' => $this->task->updated_at,
        'type'       => $this->type,
      ],
    ];
  }
}
