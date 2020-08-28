<?php

use App\Models\Conversation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConversationsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $conversations = [
      [
        'name' => 'Group 1',
        'creator_id' => 1,
        'type' => 'group',
      ],
      [
        'name' => 'Group 2',
        'creator_id' => 3,
        'type' => 'group',
      ],
      [
        'name' => 'Group 3',
        'creator_id' => 19,
        'type' => 'group',
      ],
      [
        'name' => null,
        'creator_id' => 1,
        'type' => 'private'
      ]
    ];

    DB::table('conversations')->insert($conversations);

    $conversation1 = Conversation::findOrFail(1);
    $conversation1->users()->attach([1, 2, 3, 4, 5]);

    $conversation2 = Conversation::findOrFail(2);
    $conversation2->users()->attach([1, 2, 4, 6, 8]);

    $conversation2 = Conversation::findOrFail(3);
    $conversation2->users()->attach([17, 18, 19]);

    $conversation2 = Conversation::findOrFail(4);
    $conversation2->users()->attach([1, 2]);
  }
}
