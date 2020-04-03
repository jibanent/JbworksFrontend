<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $roles     =  [
      [
        'name'       => 'Admin',
        'guard_name' => 'api',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
      [
        'name'       => 'Leader',
        'guard_name' => 'api',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
      [
        'name'       => 'Member',
        'guard_name' => 'api',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      ],
    ];

    DB::table('roles')->insert($roles);
  }
}
