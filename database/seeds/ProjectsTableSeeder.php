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
        'manager_id' => 2,
        'name' => '20191101 小林様お打合せレイアウト',
        'description' => '',
        'start_date' =>  Carbon::create('2019', '11', '01'),
        'finish_date' =>  Carbon::create('2020', '02', '01'),
        'open_status' => 'on_track',
        'close_status' => null,
        'is_internal' => 1,
        'active' => 1,
        'created_at' => Carbon::create('2019', '11', '01'),
        'updated_at' => Carbon::now(),
      ],
      [
        'department_id' => 1,
        'manager_id' => 2,
        'name' => '20191119 ｱﾋﾞﾘﾃｨﾎｰﾑ',
        'description' => '',
        'start_date' =>  Carbon::create('2019', '11', '19'),
        'finish_date' =>  Carbon::create('2020', '02', '01'),
        'open_status' => 'off_track',
        'close_status' => 'failed',
        'is_internal' => 1,
        'active' => 1,
        'created_at' => Carbon::create('2019', '11', '01'),
        'updated_at' => Carbon::now(),
      ],
      [
        'department_id' => 1,
        'manager_id' => 2,
        'name' => '20200107 トーセイ・アーバンホーム様東玉川学園1丁目',
        'description' => '',
        'start_date' =>  Carbon::create('2020', '01', '07'),
        'finish_date' =>  Carbon::create('2020', '06', '01'),
        'open_status' => 'off_track',
        'close_status' => null,
        'is_internal' => 1,
        'active' => 1,
        'created_at' => Carbon::create('2019', '01', '07'),
        'updated_at' => Carbon::now(),
      ],
      [
        'department_id' => 1,
        'manager_id' => 2,
        'name' => '20200107 白山大薮建設様　加藤様邸',
        'description' => '',
        'start_date' =>  Carbon::create('2020', '01', '07'),
        'finish_date' =>  Carbon::create('2020', '07', '01'),
        'open_status' => 'on_track',
        'close_status' => null,
        'is_internal' => 1,
        'active' => 1,
        'created_at' => Carbon::create('2020', '01', '07'),
        'updated_at' => Carbon::now(),
      ],
      [
        'department_id' => 1,
        'manager_id' => 2,
        'name' => '20200120　クリアジャパン様小明町９号棟',
        'description' => '',
        'start_date' =>  Carbon::create('2020', '01', '20'),
        'finish_date' =>  Carbon::create('2020', '08', '01'),
        'open_status' => 'on_track',
        'close_status' => 'success',
        'is_internal' => 0,
        'active' => 1,
        'created_at' => Carbon::create('2020', '01', '20'),
        'updated_at' => Carbon::now(),
      ],
    ];

    DB::table('projects')->insert($projects);


    $project1 = Project::findOrFail(1);
    $project1->users()->attach([8,9, 10]);

    $project2 = Project::findOrFail(2);
    $project2->users()->attach([10, 11, 12]);

    $project3 = Project::findOrFail(3);
    $project3->users()->attach([13, 14]);

    $project4 = Project::findOrFail(4);
    $project4->users()->attach([15, 16, 17]);

    $project5 = Project::findOrFail(5);
    $project5->users()->attach([18, 19]);
  }
}
