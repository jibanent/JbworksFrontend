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
      ['name' => 'Đang làm'],
      ['name' => 'Đã xong'],
      ['name' => 'Chờ review'],
    ];

    DB::table('task_statuses')->insert($taskStatus);
  }
}
