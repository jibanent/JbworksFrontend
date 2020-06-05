<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $table = 'projects';
  protected $fillable = ['department_id', 'manager_id', 'name', 'description', 'start_date', 'finish_date', 'status_id', 'is_internal', 'active'];

  /**
   *  Get the department that owns the project
   *
   * @return mixed
   */
  public function department()
  {
    return $this->belongsTo(Department::class);
  }

  public function tasks()
  {
    return $this->hasMany(Task::class);
  }

  public function projectStatus()
  {
    return $this->belongsTo(ProjectStatus::class, 'status_id');
  }

  /**
   * The users that belong to the projects.
   */
  public function users()
  {
    return $this->belongsToMany(User::class);
  }

  public function manager()
  {
    return $this->belongsTo(User::class, 'manager_id');
  }

  public function scopePaginated($query)
  {
    return $query->paginate(30);
  }
}
