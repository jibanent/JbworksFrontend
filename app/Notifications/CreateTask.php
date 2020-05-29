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
   * Get the mail representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return \Illuminate\Notifications\Messages\MailMessage
   */
  public function toMail($notifiable)
  {
    return (new MailMessage)
      ->line('The introduction to the notification.')
      ->action('Notification Action', url('/'))
      ->line('Thank you for using our application!');
  }

  /**
   * Get the array representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function toArray($notifiable)
  {
    $createBy = User::findOrFail($this->task->created_by);
    return [
      'new_task'     => [
        'id'         => $this->task->id,
        'name'       => $this->task->name,
        'project'    => [
          'id'       => $this->task->project->id,
          'name'     => $this->task->project->name,
        ],
        'create_by'  => [
          'id'       => $createBy->id,
          'name'     => $createBy->name,
          'avatar'   => avatar($createBy->avatar),
        ],
        'created_at' => $this->task->created_at
      ],
    ];
  }
}
