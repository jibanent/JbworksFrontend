<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
  use SoftDeletes;

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
   * Get ids of department and children departments
   */
  public function getDepartmentsIds($department)
  {
    if (!empty($department)) {
      $array = array($department->id);
      if (count($department->subdepartments) == 0) return $array;
      else return array_merge($array, $this->getChildrenIds($department->subdepartments));
    } else return null;
  }

  /**
   * Get ids of children departments
   */
  public function getChildrenIds($subdepartments)
  {
    $array = array();
    foreach ($subdepartments as $subdepartment) {
      array_push($array, $subdepartment->id);
      if (count($subdepartment->subdepartments))
        $array = array_merge($array, $this->getChildrenIds($subdepartment->subdepartments));
    }
    return $array;
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

  /**
   * Override parent boot and Call deleting event
   *
   * @return void
   */
  protected static function boot()
  {
    parent::boot();

    static::deleting(function ($department) {
      foreach ($department->users()->get() as $user) {
        $user->delete();
      }
      foreach ($department->projects()->get() as $project) {
        $project->delete();
      }
      foreach ($department->children()->get() as $children) {
        $children->delete();
      }
    });
  }
}
