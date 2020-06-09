<?php

use App\Models\Project;
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
        'open_status' => 'on_track',
        'close_status' => null,
        'is_internal' => 1,
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
        'open_status' => 'off_track',
        'close_status' => 'failed',
        'is_internal' => 1,
        'active' => 0,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'department_id' => 2,
        'manager_id' => 2,
        'name' => 'DA- phòng mổ tim đà nẵng',
        'description' => '',
        'start_date' =>  Carbon::create('2020', '01', '01'),
        'finish_date' =>  Carbon::create('2020', '02', '01'),
        'open_status' => 'off_track',
        'close_status' => null,
        'is_internal' => 1,
        'active' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ],
      [
        'department_id' => 1,
        'manager_id' => 1,
        'name' => 'Lắp đặt hệ thống an ninh',
        'description' => '',
        'start_date' =>  Carbon::create('2020', '01', '01'),
        'finish_date' =>  Carbon::create('2020', '02', '01'),
        'open_status' => 'on_track',
        'close_status' => null,
        'is_internal' => 1,
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
        'open_status' => 'on_track',
        'close_status' => 'success',
        'is_internal' => 0,
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
        'open_status' => 'at_risk',
        'close_status' => null,
        'is_internal' => 0,
        'active' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]
    ];

    DB::table('projects')->insert($projects);


    $project1 = Project::findOrFail(1);
    $project1->users()->attach([1,5,6]);

    $project2 = Project::findOrFail(2);
    $project2->users()->attach([1,2,3,4,5,6]);

    $project3 = Project::findOrFail(3);
    $project3->users()->attach([3]);

    $project4 = Project::findOrFail(4);
    $project4->users()->attach([1,11]);

    $project5 = Project::findOrFail(5);
    $project5->users()->attach([3,4,5]);

    $project6 = Project::findOrFail(6);
    $project6->users()->attach([2,5,6,8]);
  }
}
