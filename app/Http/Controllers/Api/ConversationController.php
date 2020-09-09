<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageDelivered;
use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Resources\Conversation as ConversationResource;
use App\Http\Resources\Message as ResourcesMessage;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ConversationController extends Controller
{
  protected $conversation;
  protected $user;
  protected $message;

  public function __construct(Conversation $conversation, User $user, Message $message)
  {
    $this->conversation = $conversation;
    $this->user = $user;
    $this->message = $message;
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

  public function addUsersToConversation(Request $request)
  {
    try {
      DB::beginTransaction();
      $users = $this->user->whereIn('username', $request->users);
      $conversation = $this->conversation->findOrFail($request->conversation_id);
      $conversation->update([
        'type' => 'group',
        'latest_message_at' => Carbon::now()
      ]);
      $conversation->users()->syncWithoutDetaching($users->pluck('id')->toArray());

      $content = '<span class="log">has added <em>' . $users->pluck('name')->implode(', ') . '</em> to the conversation</span>';

      $message = $this->message->create([
        'message' => $content,
        'sender_id'       => auth()->user()->id,
        'conversation_id' => $conversation->id,
      ]);

      broadcast(new MessageDelivered($message->load('sender'), $conversation))->toOthers();
      DB::commit();
      return response()->json([
        'conversation' => new ConversationResource($conversation),
        'message'      => new ResourcesMessage($message)
      ], 201);
    } catch (\Exception $exception) {
      DB::rollback();
      throw $exception;
    }
  }

  public function update(Request $request, $id)
  {
    $validator   = Validator::make($request->all(), [
      'name' => 'required'
    ]);
    if ($validator->fails()) return response()->json($validator->errors(), 422);

    try {
      $conversation = $this->conversation->findOrFail($id);
      if ($conversation->name !== null) {
        $conversation->name = $request->name;
        $conversation->save();
      }
      return new ConversationResource($conversation);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }
}
