<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Notification;

class NotificationController extends Controller
{
    public function markNotificationRead(Request $request)
    {
        if (superAdmin()) {
            Notification::where('forUser', 0)->update(['status'=> 1]);
        } else {
            Notification::where('forUser', Auth::id())->update(['status'=> 1]);
        }
        return status('Notification marked as read successfully');
    }
}
