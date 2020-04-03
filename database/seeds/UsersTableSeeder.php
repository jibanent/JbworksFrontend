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
        'name'          => 'Admin',
        'email'         => 'admin@gmail.com',
        'phone'         => '0123456789',
        'position'      => 'Nhân viên',
        'password'      => bcrypt('123123'),
        'avatar'        => 'avatar-admin.jpg',
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ],
      [
        'department_id' => 2,
        'name'          => 'Leader',
        'email'         => 'leader@gmail.com',
        'phone'         => '0905123456',
        'position'      => 'Nhân viên',
        'password'      => bcrypt('123123'),
        'avatar'        => null,
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ],
      [
        'department_id' => 3,
        'name'          => 'Member',
        'email'         => 'member@gmail.com',
        'phone'         => '0905246357',
        'position'      => 'Nhân viên',
        'password'      => bcrypt('123123'),
        'avatar'        => 'avatar-member.jpg',
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ]
    ];

    DB::table('users')->insert($users);
  }
}
