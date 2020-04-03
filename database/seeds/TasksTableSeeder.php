<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $tasks = [
      [
        'project_id' => 1,
        'assigned_to' => 1,
        'name' => 'Tìm hiểu phần mềm',
        'description' => '',
        'due_on' => Carbon::create('2020', '04', '30'),
        'status_id' => 1,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'project_id' => 2,
        'assigned_to' => 2,
        'name' => 'Code API',
        'description' => '',
        'due_on' => Carbon::create('2020', '04', '30'),
        'status_id' => 2,
        'created_by' => 2,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'project_id' => 1,
        'assigned_to' => 2,
        'name' => 'Code Front end',
        'description' => '',
        'due_on' => Carbon::create('2020', '04', '30'),
        'status_id' => 1,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'project_id' => 1,
        'assigned_to' => 3,
        'name' => 'Tìm hiểu React JS',
        'description' => '',
        'due_on' => Carbon::create('2020', '04', '30'),
        'status_id' => 1,
        'created_by' => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'project_id' => 1,
        'assigned_to' => 1,
        'name' => 'Thiết kế database',
        'description' => '',
        'due_on' => Carbon::create('2020', '04', '30'),
        'status_id' => 2,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]
    ];

    DB::table('tasks')->insert($tasks);
  }
}
