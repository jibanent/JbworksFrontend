<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
  protected $role;
  public function __construct(Role $role) {
    $this->role = $role;
  }

  public function getRoles(){
    $roles = $this->role->select('id', 'name')->get();
    return response()->json([
      'status' => 'success',
      'roles' => $roles
    ], 200);
  }
}
