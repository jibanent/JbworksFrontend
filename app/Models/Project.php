<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
  use SoftDeletes;

  protected $table = 'projects';
  protected $fillable = [
    'department_id',
    'manager_id',
    'name',
    'description',
    'start_date',
    'finish_date',
    'open_status',
    'close_status',
    'is_internal',
    'active',
    'google_drive_folder_id'
  ];

  protected $attributes = ['active' => 1];

  protected $casts = [
    'active' => 'boolean',
    'is_internal' => 'boolean',
  ];

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

  /**
   * Override parent boot and Call deleting event
   *
   * @return void
   */
  protected static function boot()
  {
    parent::boot();

    static::deleting(function ($project) {
      foreach ($project->tasks()->get() as $task) {
        $task->delete();
      }
    });
  }

  public function scopeSearch($query, $keyword)
  {
    if ($keyword !== null) {
      return $query->where(function ($query) use ($keyword) {
        $query->where('name', 'LIKE', "%{$keyword}%");
      });
    }
  }

  public function scopeIsInternal($query)
  {
    return $query->where('is_internal', 1);
  }

  public function scopeOpenStatus($query, $status)
  {
    return $query->where('open_status', $status);
  }

  public function scopeCreatedAt($query, $start, $end)
  {
    return $query->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
  }

  public function scopeStartDate($query, $start, $end)
  {
    return $query->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
  }

  public function scopeDeadline($query, $start, $end)
  {
    return $query->whereDate('finish_date', '>=', $start)->whereDate('finish_date', '<=', $end);
  }
}
