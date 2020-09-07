<?php

namespace App\Http\Controllers\Api;

use App\Events\MarkMessageAsRead;
use App\Events\MessageDelivered;
use App\Http\Controllers\Controller;
use App\Http\Resources\Conversation as ResourcesConversation;
use App\Http\Resources\Message as ResourcesMessage;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\Models\Conversation;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
  protected $user;
  protected $message;
  protected $conservation;

  public function __construct(User $user, Message $message, Conversation $conversation)
  {
    $this->user = $user;
    $this->message = $message;
    $this->conversation = $conversation;
  }

  public function index(Request $request)
  {
    if ($request->conversation_id) {
      $conservation = $this->conversation->findOrFail($request->conversation_id);
      $messages = $conservation->messages()->latest()->paginated();
      return ResourcesMessage::collection($messages);
    } else {
      $userIds      = [];
      $userIds[]    = auth()->user()->id;
      $userIds[]    = (int)$request->receiver_id;
      $user         = $this->user->findOrFail(auth()->user()->id);
      $conservation = $user->conversations()->where('type', 'private')
        ->whereHas('users', function ($query) use ($request) {
          $query->where('user_id', $request->receiver_id); // filter by other participant
        })->first();

      if ($conservation) {
        $messages = $conservation->messages()->latest()->paginated();
        return ResourcesMessage::collection($messages);
      }
      return;
    }
  }


  public function getUsers()
  {
    $users = $this->user->latest()->where('id', '!=', auth()->user()->id)->paginated();
    return UserResource::collection($users);
  }

  public function store(Request $request)
  {
    try {
      $message = $this->message->create([
        'message'         => $request->message,
        'sender_id'       => auth()->user()->id,
        'conversation_id' => $request->conversation_id,
      ]);

      $conversation = $this->conversation->findOrFail($request->conversation_id);
      $conversation->update(['latest_message_at' => Carbon::now()]);

      broadcast(new MessageDelivered($message->load('sender'), $conversation))->toOthers();

      return response()->json([
        'conversation' => new ResourcesConversation($conversation),
        'message'      => new ResourcesMessage($message)
      ], 201);
    } catch (\Exception $exception) {
      throw $exception;
    }
  }

  public function storeConversationAndMessage(Request $request)
  {
    try {
      DB::beginTransaction();
      $users = $this->user->whereIn('username', $request->users); // users join to conversation

      if (count($request->users) === 1) { // one-one
        $user = $this->user->findOrFail(auth()->user()->id);
        $conversation = $user->conversationBetweenTwoUsers($users->pluck('id')->first());

        if ($conversation) { // Check if conversation between 2 users exist
          $message = $this->saveMessage($request->message, $conversation->id);
          broadcast(new MessageDelivered($message->load('sender'), $conversation))->toOthers();
        } else {
          $userIds      = $users->pluck('id')->toArray();
          array_unshift($userIds, auth()->user()->id);
          $conversation = $this->createConversation(null, 'private', $userIds);

          $message      = $this->saveMessage($request->message, $conversation->id);

          broadcast(new MessageDelivered($message->load('sender'), $conversation))->toOthers();
        }
      } else { // chat group
        $userIds      = $users->pluck('id')->toArray();
        array_unshift($userIds, auth()->user()->id);
        $conversation = $this->createConversation($users->pluck('name')->implode(', '), 'group', $userIds);
        $message      = $this->saveMessage($request->message, $conversation->id);
        broadcast(new MessageDelivered($message->load('sender'), $conversation))->toOthers();
      }
      DB::commit();
      return response()->json([
        'conversation' => new ResourcesConversation($conversation),
        'message'      => new ResourcesMessage($message)
      ], 201);
    } catch (\Exception $exception) {
      DB::rollback();
      throw $exception;
    }
  }

  public function saveMessage($message, $conversationId)
  {
    $message = $this->message->create([
      'message'         => $message,
      'sender_id'       => auth()->user()->id,
      'conversation_id' => $conversationId,
    ]);
    return $message;
  }

  public function createConversation($name, $type, $participantIds)
  {
    $conversation = $this->conversation->create([
      'name'              => $name,
      'creator_id'        => auth()->user()->id,
      'latest_message_at' => Carbon::now(),
      'type'              => $type
    ]);
    $conversation->users()->attach($participantIds);
    return $conversation;
  }

  public function markRead(Request $request)
  {
    $user = $this->user->findOrFail(auth()->user()->id);

    if ($request->conversation_id) {
      $conversation = $this->conversation->findOrFail($request->conversation_id);
    }

    if ($request->receiver_id) {
      $conversation = $user->conversationBetweenTwoUsers($request->receiver_id);
    }

    $hasReadLatestMessage = $user->hasReadMessage($conversation->messages->last()->id);

    if ($conversation && !$hasReadLatestMessage) {
      foreach ($conversation->messages as $message) {
        if (!$user->hasReadMessage($message->id)) {
          $user->readMessages()->syncWithoutDetaching($message->id);
        }
      }
      broadcast(new MarkMessageAsRead($user, $conversation))->toOthers();
      return new UserResource($user);
    }
  }
}
