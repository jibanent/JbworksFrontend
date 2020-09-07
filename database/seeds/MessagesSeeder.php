<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesSeeder extends Seeder
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
        'conversation_id' => 1,
        'sender_id' => 1,
        'message' => 'Admin chat in group 1',
        'created_at'    => Carbon::create(2020, 9, 6, 15, 22, 21),
        'updated_at'    => Carbon::now()
      ],
      [
        'conversation_id' => 1,
        'sender_id' => 2,
        'message' => 'kstuna chat in group 1',
        'created_at'    => Carbon::create(2020, 9, 6, 15, 22, 22),
        'updated_at'    => Carbon::now()
      ],
      [
        'conversation_id' => 1,
        'sender_id' => 3,
        'message' => 'ly chat in group 1',
        'created_at'    => Carbon::create(2020, 9, 6, 15, 22, 23),
        'updated_at'    => Carbon::now()
      ],
      [
        'conversation_id' => 2,
        'sender_id' => 1,
        'message' => 'Admin chat in group 2',
        'created_at'    => Carbon::create(2020, 9, 6, 15, 22, 21),
        'updated_at'    => Carbon::now()
      ],
      [
        'conversation_id' => 2,
        'sender_id' => 2,
        'message' => 'kstuna chat in group 2',
        'created_at'    => Carbon::create(2020, 9, 6, 15, 22, 22),
        'updated_at'    => Carbon::now()
      ],
      [
        'conversation_id' => 2,
        'sender_id' => 4,
        'message' => 'minh chat in group 2',
        'created_at'    => Carbon::create(2020, 9, 6, 15, 22, 23),
        'updated_at'    => Carbon::now()
      ],

      [
        'conversation_id' => 4,
        'sender_id' => 1,
        'message' => 'Hey, how are you?',
        'created_at'    => Carbon::create(2020, 9, 6, 15, 22, 21),
        'updated_at'    => Carbon::now()
      ],
      [
        'conversation_id' => 4,
        'sender_id' => 2,
        'message' => 'I\'m fine, thank you!',
        'created_at'    => Carbon::create(2020, 9, 6, 15, 22, 22),
        'updated_at'    => Carbon::now()
      ],
      [
        'conversation_id' => 4,
        'sender_id' => 2,
        'message' => 'And you?',
        'created_at'    => Carbon::create(2020, 9, 6, 15, 22, 23),
        'updated_at'    => Carbon::now()
      ],
    ];

    DB::table('messages')->insert($messages);
  }
}
