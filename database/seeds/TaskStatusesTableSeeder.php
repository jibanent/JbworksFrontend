<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskStatusesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $taskStatus = [
      ['name' => 'Đang làm', 'color' => '#DEECF4'],
      ['name' => 'Đã xong', 'color' => '#95CA48'],
    ];

    DB::table('task_statuses')->insert($taskStatus);
  }
}
