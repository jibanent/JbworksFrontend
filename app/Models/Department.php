<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  protected $fillable = ['manager_id', 'name', 'created_by', 'active', 'parent_id'];
  protected $with = ['children'];

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

  public function parent()
  {
    return $this->belongsTo(self::class, 'parent_id');
  }

  public function children()
  {
    return $this->hasMany(self::class, 'parent_id', 'id');
  }

  public function subdepartments()
  {
    return $this->children()->with('subdepartments');
  }

  /**
   * This is for childless departments
   */
  public function scopeChildless($q)
  {
    $q->has('children', '=', 0);
  }

  public function scopePaginated($query)
  {
    return $query->paginate(80);
  }

  public function scopeSearch($query, $keyword)
  {
    if ($keyword !== null) {
      return $query->where(function ($query) use ($keyword) {
        $query->where('name', 'LIKE', "%{$keyword}%");
      });
    }
  }
}
