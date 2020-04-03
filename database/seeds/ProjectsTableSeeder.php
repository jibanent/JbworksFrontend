<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $projects = [
      [
        'department_id' => 1,
        'manager_id' => 1,
        'name' => 'Dự án Khu đô thị Kim Mã',
        'description' => '',
        'start_date' =>  Carbon::create('2020', '01', '01'),
        'finish_date' =>  Carbon::create('2020', '02', '01'),
        'status_id' => 1,
        'joined_to' => json_encode([1, 2, 3]),
        'active' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'department_id' => 1,
        'manager_id' => 1,
        'name' => 'Khai trương cửa hàng mới',
        'description' => '',
        'start_date' =>  Carbon::create('2020', '01', '01'),
        'finish_date' =>  Carbon::create('2020', '02', '01'),
        'status_id' => 2,
        'joined_to' => json_encode([2, 3]),
        'active' => 0,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'department_id' => 2,
        'manager_id' => 2,
        'name' => 'Khai trương cửa hàng mới',
        'description' => '',
        'start_date' =>  Carbon::create('2020', '01', '01'),
        'finish_date' =>  Carbon::create('2020', '02', '01'),
        'status_id' => 2,
        'joined_to' => json_encode([1, 2]),
        'active' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'department_id' => 1,
        'manager_id' => 1,
        'name' => 'Dự án Global Passport',
        'description' => '',
        'start_date' =>  Carbon::create('2020', '01', '01'),
        'finish_date' =>  Carbon::create('2020', '02', '01'),
        'status_id' => 1,
        'joined_to' => json_encode([1]),
        'active' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'department_id' => 2,
        'manager_id' => 3,
        'name' => 'Dự án Global Passport',
        'description' => '',
        'start_date' =>  Carbon::create('2020', '01', '01'),
        'finish_date' =>  Carbon::create('2020', '02', '01'),
        'status_id' => 2,
        'joined_to' => json_encode([1, 2, 3]),
        'active' => 0,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'department_id' => 2,
        'manager_id' => 2,
        'name' => 'Dự án TTVN List',
        'description' => '',
        'start_date' =>  Carbon::create('2020', '01', '01'),
        'finish_date' =>  Carbon::create('2020', '02', '01'),
        'status_id' => 1,
        'joined_to' => json_encode([2, 3]),
        'active' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]
    ];

    DB::table('projects')->insert($projects);
  }
}
