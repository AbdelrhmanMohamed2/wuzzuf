<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use ApiTrait;

    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;
        return $this->apiResponse(data: $notifications);
    }

    public function markNotification(Request $request)
    {
        auth()->user()->unreadNotifications->when($request->id, function ($q) use ($request) {
            return $q->where('id', $request->id);
        })->markAsRead();

        return redirect()->route('notifications.index');
    }
}
