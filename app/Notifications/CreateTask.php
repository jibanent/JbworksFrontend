<?php

namespace App\Notifications;

use App\Models\Task;
use App\Models\User;
use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateTask extends Notification
{
  use Queueable;

  protected $task;
  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct(Task $task)
  {
    $this->task = $task;
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
    $createdBy = User::findOrFail($this->task->created_by);
    return [
      'task'     => [
        'id'         => $this->task->id,
        'name'       => $this->task->name,
        'project'    => [
          'id'       => $this->task->project->id,
          'name'     => $this->task->project->name,
        ],
        'created_by'  => [
          'id'       => $createdBy->id,
          'name'     => $createdBy->name,
          'avatar'   => avatar($createdBy->avatar),
        ],
        'created_at' => $this->task->created_at
      ],
    ];
  }
}
