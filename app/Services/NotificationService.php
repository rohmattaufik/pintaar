<?php

namespace App\Services;

use Auth;
use App\Notification;

class NotificationService
{
    public function getAllNotifications() {
        $notifications = Notification::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        //dd($notifications);
        return $notifications;
    }
}
