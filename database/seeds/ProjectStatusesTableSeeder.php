<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $projectStatuses = [
      ['name' => 'Đúng tiến độ', 'color' => "#2ede4c"],
      ['name' => 'Chậm tiến độ', 'color' => "#ffcc00"],
      ['name' => 'Có rủi ro cao', 'color' => "#da4f4f"],
    ];

    DB::table('project_statuses')->insert($projectStatuses);
  }
}
