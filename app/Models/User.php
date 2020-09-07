<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements JWTSubject
{
  use Notifiable, HasRoles, SoftDeletes;

  protected $guard_name = 'api';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'department_id', 'name', 'username', 'email', 'phone', 'position', 'password', 'avatar', 'active',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'active' => 'boolean',
  ];

  /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * Get messages that user sent
   *
   */
  public function messages()
  {
    return $this->hasMany(Message::class, 'sender_id');
  }

  /**
   *  Get the department that owns the user
   *
   * @return mixed
   */
  public function department()
  {
    return $this->belongsTo(Department::class);
  }

  /**
   * The project that belong to the user.
   */
  public function projects()
  {
    return $this->belongsToMany(Project::class);
  }

  public function tasks()
  {
    return $this->hasMany(Task::class, 'assigned_to');
  }

  // Rest omitted for brevity

  /**
   * Get the identifier that will be stored in the subject claim of the JWT.
   *
   * @return mixed
   */
  public function getJWTIdentifier()
  {
    return $this->getKey();
  }

  /**
   * Return a key value array, containing any custom claims to be added to the JWT.
   *
   * @return array
   */
  public function getJWTCustomClaims()
  {
    return [];
  }

  public function getAllPermissionsAttribute()
  {
    $permissions = [];
    foreach (Permission::all() as $permission) {
      if (Auth::user()->can($permission->name)) {
        $permissions[] = $permission->name;
      }
    }
    return $permissions;
  }

  public function scopePaginated($query)
  {
    return $query->paginate(500);
  }

  public function scopeSearch($query, $keyword)
  {
    if ($keyword !== null) {
      return $query->where(function ($query) use ($keyword) {
        $query->where('name', 'LIKE', "%{$keyword}%")
          ->orWhere('username', 'LIKE', "%{$keyword}%")
          ->orWhere('email', 'LIKE', "%{$keyword}%");;
      });
    }
  }

  public function scopeCreatedAt($query, $start, $end)
  {
    return $query->whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end);
  }

  /**
   * Override parent boot and Call deleting event
   *
   * @return void
   */
  protected static function boot()
  {
    parent::boot();

    static::deleting(function ($user) {
      $user->projects()->sync([]);
      foreach ($user->tasks()->get() as $task) {
        $task->delete();
      }
    });
  }

  /**
   * The conversation that this user belongs to
   */
  public function conversations()
  {
    return $this->belongsToMany(Conversation::class)->withTimestamps();
  }

  /**
   * Check if user has joined conversation
   *
   * @param mixed $roomId
   *
   * @return bool
   */
  public function hasJoined($conversationId)
  {
    $conversation = $this->conversations->find($conversationId);

    return $conversation ? true : false;
  }

  /**
   * Get conversation between 2 users
   *
   */
  public function conversationBetweenTwoUsers($userId)
  {
    return $this->conversations()->where('type', 'private')
      ->whereHas('users', function ($query) use ($userId) {
        $query->where('user_id', $userId );
      })->first();
  }

  /**
   * Get read messages
   */
  public function readMessages()
  {
    return $this->belongsToMany(Message::class, 'read_messages')->withTimestamps();
  }

  /**
   * check if user has read a message
   */
  public function hasReadMessage($messageId)
  {
    return $this->readMessages->contains($messageId);
  }
}
