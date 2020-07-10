<?php

namespace App\Jobs;

use App\Mail\SendAccount;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  protected $details;
  protected $data;
  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct($details, $data)
  {
    $this->details = $details;
    $this->data = $data;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    $email = new SendAccount($this->data);
    Mail::to($this->details['email'])->send($email);
  }
}
