<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
  public function getMyNotifications()
  {
    $notifications =  auth()->user()->notifications()->paginate(10);
    return [
      'status'   => 'success',
      'notifications' => $notifications,
    ];
  }

  public function markAsRead(Request $request)
  {
    $notification = auth()->user()->unreadNotifications->where('id', $request->id)->first();
    if ($notification) {
      $notification->markAsRead();
      return response()->json([
        'status' => 'success',
        'notification' => $notification,
      ]);
    }
  }
}
