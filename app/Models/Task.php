<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $fillable = ['project_id', 'assigned_to', 'name', 'description', 'start_date', 'due_on', 'status_id', 'created_by'];

  public function project()
  {
    return $this->belongsTo(Project::class);
  }

  public function taskStatus()
  {
    return $this->belongsTo(TaskStatus::class, 'status_id');
  }
}
