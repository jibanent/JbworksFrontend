<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Resources\Conversation as ConversationResource;

class ConversationController extends Controller
{
  protected $conversation;

  public function __construct(Conversation $conversation)
  {
    $this->conversation = $conversation;
  }

  public function getSingleUserConversations(Request $request)
  {

    $userId = auth()->user()->id;
    $conversations = Conversation::whereHas(
      'users',
      function ($query) use ($userId) {
        $query->where('user_id', $userId);
      }
    )->orderBy('latest_message_at', 'DESC')->paginated();
    return ConversationResource::collection($conversations);
  }
}
