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
        'username'      => 'admin',
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
        'department_id' => 1,
        'name'          => 'Admin2',
        'username'      => 'admin2',
        'email'         => 'admin2@gmail.com',
        'phone'         => '0123456734',
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
        'username'      => 'leader',
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
        'username'      => 'member',
        'email'         => 'member@gmail.com',
        'phone'         => '0905246357',
        'position'      => 'Nhân viên',
        'password'      => bcrypt('123123'),
        'avatar'        => 'avatar-member.jpg',
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ],
      [
        'department_id' => 1,
        'name'          => 'Nguyễn Hạnh',
        'username'      => 'nguyenhanh',
        'email'         => 'nguyenhanh@gmail.com',
        'phone'         => '0123456780',
        'position'      => 'Nhân viên',
        'password'      => bcrypt('123123'),
        'avatar'        => null,
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ],
      [
        'department_id' => 1,
        'name'          => 'Nguyễn Vân',
        'username'      => 'nguyenvan',
        'email'         => 'nguyenvan@gmail.com',
        'phone'         => '0123456781',
        'position'      => 'Nhân viên',
        'password'      => bcrypt('123123'),
        'avatar'        => null,
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ],
      [
        'department_id' => 1,
        'name'          => 'Trần Thị Khánh Linh',
        'username'      => 'khanhlinh',
        'email'         => 'khanhlinh@gmail.com',
        'phone'         => '0123456782',
        'position'      => 'Nhân viên',
        'password'      => bcrypt('123123'),
        'avatar'        => null,
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ],
      [
        'department_id' => 2,
        'name'          => 'Hoàng Trần Minh Hằng',
        'username'      => 'minhhang',
        'email'         => 'minhhang@gmail.com',
        'phone'         => '0123456783',
        'position'      => 'Nhân viên',
        'password'      => bcrypt('123123'),
        'avatar'        => null,
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ],
      [
        'department_id' => 2,
        'name'          => 'Nguyễn Tuyết',
        'username'      => 'nguyentuyet',
        'email'         => 'tuyet@gmail.com',
        'phone'         => '0123456784',
        'position'      => 'Nhân viên',
        'password'      => bcrypt('123123'),
        'avatar'        => null,
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ],
      [
        'department_id' => 2,
        'name'          => 'Trần Đình Mạnh',
        'username'      => 'dinhmanh',
        'email'         => 'dinhmanh@gmail.com',
        'phone'         => '0123456785',
        'position'      => 'Nhân viên',
        'password'      => bcrypt('123123'),
        'avatar'        => null,
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ],
      [
        'department_id' => 3,
        'name'          => 'Nguyễn Thanh Thảo',
        'username'      => 'thanhthao',
        'email'         => 'thanhthao@gmail.com',
        'phone'         => '0123456786',
        'position'      => 'Nhân viên',
        'password'      => bcrypt('123123'),
        'avatar'        => null,
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ],
      [
        'department_id' => 3,
        'name'          => 'Nguyễn Thị Bích Phương',
        'username'      => 'bichphuong',
        'email'         => 'binhphuong@gmail.com',
        'phone'         => '0123456787',
        'position'      => 'Nhân viên',
        'password'      => bcrypt('123123'),
        'avatar'        => null,
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ],
      [
        'department_id' => 3,
        'name'          => 'Nguyễn Huyền',
        'username'      => 'nguyenhuyen',
        'email'         => 'huyen@gmail.com',
        'phone'         => '0123456788',
        'position'      => 'Nhân viên',
        'password'      => bcrypt('123123'),
        'avatar'        => null,
        'active'        => true,
        'created_at'    => Carbon::now(),
        'updated_at'    => Carbon::now()
      ]
    ];

    DB::table('users')->insert($users);
  }
}
