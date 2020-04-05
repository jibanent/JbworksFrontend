<?php

namespace App\Models;

use Carbon\Carbon;
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

  public function userAssigned()
  {
    return $this->belongsTo(User::class, 'assigned_to');
  }

  public function userCreatedBy()
  {
    return $this->belongsTo(User::class, 'created_by');
  }

}
