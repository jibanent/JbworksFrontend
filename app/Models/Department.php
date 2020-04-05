<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  protected $fillable = ['manager_id', 'name', 'created_by', 'active'];

  /**
   * Get the users for the department.
   */
  public function users()
  {
    return $this->hasMany(User::class);
  }

  /**
   * Get department creator
   */
  public function departmentCreator()
  {
    return $this->belongsTo(User::class, 'created_by');
  }

  /**
   * Get department manager
   */
  public function departmentManager()
  {
    return $this->belongsTo(User::class, 'manager_id');
  }

  /**
   * Get the project for the department.
   */
  public function projects()
  {
    return $this->hasMany(Project::class);
  }

}
