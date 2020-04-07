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
      ['name' => 'Đúng tiến độ', 'color' => "#1FB53A"],
      ['name' => 'Chậm tiến độ', 'color' => "#EDCB21"],
      ['name' => 'Có rủi ro cao', 'color' => "#C92E2E"],
    ];

    DB::table('project_statuses')->insert($projectStatuses);
  }
}
