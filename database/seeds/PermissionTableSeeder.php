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

    Permission::create(['name' => 'create new task']);
    Permission::create(['name' => 'edit task name']);
    Permission::create(['name' => 'edit task description']);
    Permission::create(['name' => 'edit start date and deadline']);
    Permission::create(['name' => 'edit task result']);
    Permission::create(['name' => 'delete task']);
    Permission::create(['name' => 'mark done and undone']);
    Permission::create(['name' => 'view tasks of other members']);
    Permission::create(['name' => 'view - assign unassigned tasks']);
    Permission::create(['name' => 'view project report']);
    Permission::create(['name' => 'delegate task']);

    $role = Role::create(['name' => 'Admin']);
    $role->givePermissionTo(Permission::all());

    $role = Role::create(['name' => 'Leader']);
    $role->givePermissionTo(Permission::all());

    $role = Role::create(['name' => 'Member']);
    $role->givePermissionTo(['view project report', 'edit task result']);

    $user = User::find(1);
    $user->assignRole('admin');

    $user = User::find(2);
    $user->assignRole('leader');

    $user = User::find(3);
    $user->assignRole('member');
  }
}
