<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

  protected $fillable = ['message', 'sender_id', 'conversation_id'];
  protected $dateFormat = 'Y-m-d H:i:s.u';

  public function sender()
  {
    return $this->belongsTo(User::class, 'sender_id');
  }

  /**
   * Define room relationship
   *
   * @return mixed
   */
  public function conversation()
  {
    return $this->belongsTo(Room::class);
  }

  public function scopePaginated($query)
  {
    return $query->paginate(10);
  }

  /**
   * Get users has read the message
   */
  public function readers()
  {
    return $this->belongsToMany(User::class, 'read_messages')->withTimestamps();
  }
}
