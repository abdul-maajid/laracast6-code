<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function show()
    {
        return view('notifications.show', [
            'notifications' => tap(auth()->user()->unreadNotifications)->markAsRead()
        ]);
    }
}
