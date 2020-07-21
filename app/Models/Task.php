<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
  use SoftDeletes;
  protected $fillable = [
    'project_id',
    'assigned_to',
    'name',
    'description',
    'percent_complete',
    'result',
    'start_date',
    'due_on',
    'completed_date',
    'status_id',
    'is_urgent',
    'is_important',
    'is_overdue',
    'late_completed',
    'mark_star',
    'created_by'
  ];

  protected $casts = [
    'is_urgent' => 'boolean',
    'is_important' => 'boolean',
    'is_overdue' => 'boolean',
    'late_completed' => 'boolean',
    'mark_star' => 'boolean',
  ];

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

  public function scopePaginated($query)
  {
    return $query->paginate(100);
  }

  public function scopeOrdered($query, $order = null)
  {
    if ($order === null) return $query->orderBy('updated_at', 'DESC');
    if ($order === 'created')  return $query->orderBy('created_at', 'DESC');
    if ($order === 'deadline') return $query->orderBy('due_on', 'DESC');
  }

  // search restaurant name
  public function scopeSearch($query, $keyword)
  {
    if ($keyword !== null) {
      return $query->where(function ($query) use ($keyword) {
        $query->where('name', 'LIKE', "%{$keyword}%");
      });
    }
  }

  // doing||done||done_late||overdue||urgent||important
  public function scopeFilterStatus($query, $status)
  {
    if ($status === 'doing') return $query->where('status_id', 1);
    if ($status === 'done') return $query->where('status_id', 2);
    if ($status === 'done_late') return $query->where('late_completed', 1);
    if ($status === 'overdue') return $query->where('is_overdue', 1);
    if ($status === 'urgent') return $query->where('is_urgent', 1);
    if ($status === 'important') return $query->where('is_important', 1);
  }

  public function scopeDoneOnTime($query)
  {
    return $query->where('status_id', 2)->where('is_overdue', 0)->where('late_completed', 0);
  }

  public function scopeDoneLate($query)
  {
    return $query->where('status_id', 2)->where('is_overdue', 1)->where('late_completed', 1);
  }

  public function scopeDoing($query)
  {
    return $query->where('status_id', 1)->where('is_overdue', 0)->where('late_completed', 0);
  }

  public function scopeOverdue($query)
  {
    return $query->where('status_id', 1)->where('is_overdue', 1)->where('late_completed', 0);
  }

  public function scopeDone($query)
  {
    return $query->where('status_id', 2);
  }

  public function scopeWithoutDeadline($query)
  {
    return $query->where('due_on', null);
  }

  public function scopeCreatedAt($query, $start, $end)
  {
    return $query->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
  }

  public function scopeStartDate($query, $start, $end)
  {
    return $query->whereDate('start_date', '>=', $start)->whereDate('start_date', '<=', $end);
  }

  public function scopeDueOn($query, $start, $end)
  {
    return $query->whereDate('due_on', '>=', $start)->whereDate('due_on', '<=', $end);
  }
}
