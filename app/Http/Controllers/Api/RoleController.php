<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\Role as RoleResource;
use App\Http\Resources\Permission as PermissionResource;

class RoleController extends Controller
{
  protected $role;
  protected $permission;
  public function __construct(Role $role, Permission $permission)
  {
    $this->role = $role;
    $this->permission = $permission;
  }

  public function getRoles()
  {
    $roles = $this->role->select('id', 'name')->get();
    return response()->json([
      'status' => 'success',
      'roles' => $roles
    ], 200);
  }

  public function getRolesPermissions()
  {
    $roles       = RoleResource::collection($this->role->all());
    $permissions = PermissionResource::collection($this->permission->all());
    return response()->json([
      'status'      => 'success',
      'roles'       => $roles,
      'permissions' => $permissions
    ], 200);
  }

  public function giveOrRevokePermission(Request $request)
  {
    try {
      $role = $this->role->find($request->role);
      if ($request->checked) {
        $role->givePermissionTo($request->permission);
      } else {
        $role->revokePermissionTo($request->permission);
      }
      return response()->json([
        'status' => 'success',
        'roles' => new RoleResource($role)
      ], 200);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }
}
