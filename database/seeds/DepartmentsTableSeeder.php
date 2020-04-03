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
        'name'       => 'Team IT',
        'active'     => true,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
      [
        'manager_id' => 2,
        'name'       => 'Kiến trúc',
        'active'     => true,
        'created_by' => 2,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
      [
        'manager_id' => 1,
        'name'       => 'Auto CAD',
        'active'     => true,
        'created_by' => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ]
    ];

    DB:: table('departments')->insert($departments);
  }
}
