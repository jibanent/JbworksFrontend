<?php

namespace App\Console\Commands;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateOverdue extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'command:update_overdue';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
    try {
      Task::where('due_on', '<', Carbon::now())
      ->where('status_id', 1)
      ->where('is_overdue', 0)
      ->update(['is_overdue' => 1]);
      $this->info('command:update_overdue Command Run successfully!');
    } catch (\Exception $exception) {
      throw $exception;
    }
  }
}
