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
      ['name' => 'Đang làm', 'slug' => 'doing',  'color' => '#389DD9'],
      ['name' => 'Đã xong', 'slug' => 'done', 'color' => '#14CC3F'],
    ];

    DB::table('task_statuses')->insert($taskStatus);
  }
}
