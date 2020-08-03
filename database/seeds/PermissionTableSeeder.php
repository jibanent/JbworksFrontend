<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    Permission::create(['name' => 'create new user']);
    Permission::create(['name' => 'edit user']);
    Permission::create(['name' => 'delete user']);
    Permission::create(['name' => 'create new task']);
    // Permission::create(['name' => 'create new task list']);
    Permission::create(['name' => 'view tasks of other members']);
    Permission::create(['name' => 'view - assign unassigned tasks']);
    Permission::create(['name' => 'view project report']);
    // Permission::create(['name' => 'create new topic']);
    // Permission::create(['name' => 'upload new file']);

    Permission::create(['name' => 'edit task name']);
    Permission::create(['name' => 'mark done and undone']);
    Permission::create(['name' => 'edit task description']);
    Permission::create(['name' => 'edit start date and deadline']);
    Permission::create(['name' => 'edit task result']);
    // Permission::create(['name' => 'create and update checklist']);
    Permission::create(['name' => 'delete task']);
    Permission::create(['name' => 'delegate task']);

    $role = Role::create(['name' => 'admin']);
    $role->givePermissionTo(Permission::all());

    $role = Role::create(['name' => 'leader']);
    $role->givePermissionTo(Permission::all());

    $role = Role::create(['name' => 'manager']);
    $role->givePermissionTo([
      'create new task',
      'view tasks of other members',
      'view - assign unassigned tasks',
      'view project report',
      'edit task name',
      'mark done and undone',
      'edit task description',
      'edit start date and deadline',
      'edit task result',
      'delete task',
      'delegate task'
    ]);

    $role = Role::create(['name' => 'member']);
    $role->givePermissionTo(['view project report', 'edit task result']);

    $user = User::find(1);
    $user->assignRole('admin');

    $users = User::whereIn('id', [2, 3, 4, 5, 6, 7])->get();
    foreach ($users as $user) {
      $user->assignRole('leader');
    }

    $users = User::whereIn('id', [8])->get();
    foreach ($users as $user) {
      $user->assignRole('manager');
    }

    $users = User::whereIn('id', [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19])->get();
    foreach ($users as $user) {
      $user->assignRole('member');
    }
  }
}
