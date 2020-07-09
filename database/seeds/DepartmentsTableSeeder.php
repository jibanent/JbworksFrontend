<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $departments     =  [
      [
        'manager_id' => 1,
        'name'       => 'Phòng kinh doanh',
        'active'     => true,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
      [
        'manager_id' => 2,
        'name'       => 'Phòng kỹ thuật',
        'active'     => true,
        'created_by' => 2,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
      [
        'manager_id' => 3,
        'name'       => 'Phòng kế toán',
        'active'     => true,
        'created_by' => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
      [
        'manager_id' => 4,
        'name'       => 'Phòng Hành chính nhân sự',
        'active'     => true,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
      [
        'manager_id' => 5,
        'name'       => 'Phòng Marketing',
        'active'     => true,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ]
    ];

    DB:: table('departments')->insert($departments);
  }
}
