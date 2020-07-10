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
      // Tasks of project 1
      [
        'project_id'       => 1,
        'assigned_to'      => 8,
        'name'             => 'Visual 20191101 小林様お打合せレイアウト',
        'description'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
        'percent_complete' => 100,
        'start_date'       => Carbon::create('2020', '07', '10'),
        'due_on'           => Carbon::create('2020', '07', '10'),
        'status_id'        => 2, // xong đúng hạn
        'is_overdue'       => 0,
        'late_completed'   => 0,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '10'),
        'updated_at'       => Carbon::now(),
      ],
      [
        'project_id'       => 1,
        'assigned_to'      => 9,
        'name'             => 'Pasu 20191101 小林様お打合せレイアウト',
        'description'      => '',
        'percent_complete' => 100,
        'start_date'       => Carbon::create('2020', '07', '05'),
        'due_on'           => Carbon::create('2020', '07', '08'),
        'status_id'        => 2, // xong trể hạn
        'is_overdue'       => 1,
        'late_completed'   => 1,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '05'),
        'updated_at'       => Carbon::now(),
      ],
      [
        'project_id'       => 1,
        'assigned_to'      => 10,
        'name'             => 'VR 20191101 小林様お打合せレイアウト',
        'description'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
        'percent_complete' => 60,
        'start_date'       => Carbon::create('2020', '07', '10'),
        'due_on'           => Carbon::create('2020', '08', '1'),
        'status_id'        => 1, // đang làm
        'is_overdue'       => 0,
        'late_completed'   => 0,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '10'),
        'updated_at'       => Carbon::now(),
      ],
      // Tasks of project 2
      [
        'project_id'       => 2,
        'assigned_to'      => 11,
        'name'             => 'Visual 20191101 小林様お打合せレイアウト',
        'description'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
        'percent_complete' => 100,
        'start_date'       => Carbon::create('2020', '07', '05'),
        'due_on'           => Carbon::create('2020', '07', '08'),
        'status_id'        => 1, // trể deadline
        'is_overdue'       => 1,
        'late_completed'   => 0,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '05'),
        'updated_at'       => Carbon::now(),
      ],
      [
        'project_id'       => 2,
        'assigned_to'      => 12,
        'name'             => 'Pasu 20191101 小林様お打合せレイアウト',
        'description'      => '',
        'percent_complete' => 100,
        'start_date'       => Carbon::create('2020', '07', '05'),
        'due_on'           => Carbon::create('2020', '07', '08'),
        'status_id'        => 2, // xong trể hạn
        'is_overdue'       => 1,
        'late_completed'   => 1,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '05'),
        'updated_at'       => Carbon::now(),
      ],
      [
        'project_id'       => 2,
        'assigned_to'      => 13,
        'name'             => 'VR 20191101 小林様お打合せレイアウト',
        'description'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
        'percent_complete' => 60,
        'start_date'       => Carbon::create('2020', '07', '05'),
        'due_on'           => Carbon::create('2020', '08', '01'),
        'status_id'        => 1, // đang làm
        'is_overdue'       => 0,
        'late_completed'   => 0,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2019', '11', '05'),
        'updated_at'       => Carbon::now(),
      ],
      // tasks of project 3
      [
        'project_id'       => 3,
        'assigned_to'      => 14,
        'name'             => 'Visual 20191101 小林様お打合せレイアウト',
        'description'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
        'percent_complete' => 100,
        'start_date'       => Carbon::create('2020', '07', '09'),
        'due_on'           => Carbon::create('2020', '07', '10'),
        'status_id'        => 2, // xong đúng hạn
        'is_overdue'       => 0,
        'late_completed'   => 0,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '09'),
        'updated_at'       => Carbon::now(),
      ],
      [
        'project_id'       => 3,
        'assigned_to'      => 15,
        'name'             => 'Pasu 20191101 小林様お打合せレイアウト',
        'description'      => '',
        'percent_complete' => 100,
        'start_date'       => Carbon::create('2020', '07', '09'),
        'due_on'           => Carbon::create('2020', '07', '10'),
        'status_id'        => 2, // xong trể hạn
        'is_overdue'       => 1,
        'late_completed'   => 1,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '09'),
        'updated_at'       => Carbon::now(),
      ],
      [
        'project_id'       => 3,
        'assigned_to'      => 16,
        'name'             => 'VR 20191101 小林様お打合せレイアウト',
        'description'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
        'percent_complete' => 60,
        'start_date'       => Carbon::create('2020', '07', '09'),
        'due_on'           => Carbon::create('2020', '08', '10'),
        'status_id'        => 1, // đang làm
        'is_overdue'       => 0,
        'late_completed'   => 0,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '09'),
        'updated_at'       => Carbon::now(),
      ],
      // tasks of project 4
      [
        'project_id'       => 4,
        'assigned_to'      => 17,
        'name'             => 'Visual 20191101 小林様お打合せレイアウト',
        'description'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
        'percent_complete' => 100,
        'start_date'       => Carbon::create('2020', '07', '08'),
        'due_on'           => Carbon::create('2020', '08', '1'),
        'status_id'        => 2, // xong đúng hạn
        'is_overdue'       => 0,
        'late_completed'   => 0,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '08'),
        'updated_at'       => Carbon::now(),
      ],
      [
        'project_id'       => 4,
        'assigned_to'      => 18,
        'name'             => 'Pasu 20191101 小林様お打合せレイアウト',
        'description'      => '',
        'percent_complete' => 100,
        'start_date'       => Carbon::create('2020', '07', '08'),
        'due_on'           => Carbon::create('2020', '08', '1'),
        'status_id'        => 2, // xong trể hạn
        'is_overdue'       => 1,
        'late_completed'   => 1,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '08'),
        'updated_at'       => Carbon::now(),
      ],
      [
        'project_id'       => 4,
        'assigned_to'      => 19,
        'name'             => 'VR 20191101 小林様お打合せレイアウト',
        'description'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
        'percent_complete' => 60,
        'start_date'       => Carbon::create('2020', '07', '07'),
        'due_on'           => Carbon::create('2020', '08', '1'),
        'status_id'        => 1, // đang làm
        'is_overdue'       => 0,
        'late_completed'   => 0,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '07'),
        'updated_at'       => Carbon::now(),
      ],
      // tasks of project 5
      [
        'project_id'       => 5,
        'assigned_to'      => 8,
        'name'             => 'Visual 20191101 小林様お打合せレイアウト',
        'description'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
        'percent_complete' => 100,
        'start_date'       => Carbon::create('2020', '07', '04'),
        'due_on'           => Carbon::create('2020', '08', '1'),
        'status_id'        => 2, // xong đúng hạn
        'is_overdue'       => 0,
        'late_completed'   => 0,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '04'),
        'updated_at'       => Carbon::now(),
      ],
      [
        'project_id'       => 5,
        'assigned_to'      => 9,
        'name'             => 'Pasu 20191101 小林様お打合せレイアウト',
        'description'      => '',
        'percent_complete' => 100,
        'start_date'       => Carbon::create('2020', '07', '04'),
        'due_on'           => Carbon::create('2020', '08', '1'),
        'status_id'        => 2, // xong trể hạn
        'is_overdue'       => 1,
        'late_completed'   => 1,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '04'),
        'updated_at'       => Carbon::now(),
      ],
      [
        'project_id'       => 5,
        'assigned_to'      => 10,
        'name'             => 'VR 20191101 小林様お打合せレイアウト',
        'description'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
        'percent_complete' => 60,
        'start_date'       => Carbon::create('2020', '07', '04'),
        'due_on'           => Carbon::create('2020', '08', '1'),
        'status_id'        => 1, // đang làm
        'is_overdue'       => 0,
        'late_completed'   => 0,
        'created_by'       => 1,
        'created_at'       => Carbon::create('2020', '07', '04'),
        'updated_at'       => Carbon::now(),
      ],
    ];

    DB::table('tasks')->insert($tasks);
  }
}
