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
        'manager_id' => 2,
        'name'       => '住宅事業部チーム ',
        'active'     => true,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
      [
        'manager_id' => 3,
        'name'       => 'FREEDOMのチーム',
        'active'     => true,
        'created_by' => 2,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
      [
        'manager_id' => 4,
        'name'       => '経理チーム経理チーム',
        'active'     => true,
        'created_by' => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
      [
        'manager_id' => 5,
        'name'       => '解析チーム',
        'active'     => true,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
      [
        'manager_id' => 6,
        'name'       => '業務チーム',
        'active'     => true,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
      [
        'manager_id' => 7,
        'name'       => 'オートキャドチーム',
        'active'     => true,
        'created_by' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ]
    ];

    DB:: table('departments')->insert($departments);
  }
}
