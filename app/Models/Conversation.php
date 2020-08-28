<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{

  /**
   * The attributes that are mass assigned
   *
   * @return array
   */
  protected $fillable = [
    'name', 'creator_id', 'type', 'latest_message_at'
  ];

  /**
   * The conversation that belongs to the user
   */
  public function users()
  {
    return $this->belongsToMany(User::class)->withTimestamps();
  }

  /**
   * Define conversations relationship
   *
   * @return mixed
   */
  public function messages()
  {
    return $this->hasMany(Message::class);
  }

  /**
   * User created the conversation
   */
  public function creator()
  {
    return $this->belongsTo(User::class, 'creator_id');
  }

  public function scopePaginated($query)
  {
    return $query->paginate(20);
  }
}
