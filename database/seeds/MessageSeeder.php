<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $messages = [
      [
        'sender_id' => 1,
        'receiver_id' => 2,
        'message' => 'Hey, how are you?',
        'read' => 0,
      ],
    ];
    DB::table('messages')->insert($messages);
  }
}
