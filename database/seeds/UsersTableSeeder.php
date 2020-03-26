<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = [
      [
        'department_id' => 1,
        'name'          => 'Super admin',
        'email'         => 'superadmin@gmail.com',
        'phone'         => '0123456789',
        'password'      => bcrypt('123123'),
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ],
      [
        'department_id' => 2,
        'name'          => 'Leader',
        'email'         => 'leader@gmail.com',
        'phone'         => '0905123456',
        'password'      => bcrypt('123123'),
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ],
      [
        'department_id' => 3,
        'name'          => 'Member',
        'email'         => 'member@gmail.com',
        'phone'         => '0905246357',
        'password'      => bcrypt('123123'),
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ]
    ];

    DB::table('users')->insert($users);
  }
}
