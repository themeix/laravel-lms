<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

ini_set('max_execution_time', 3600);

class InstallerController extends Controller
{
    public function notificationUrl($uuid)
    {
        $notification = Notification::whereUuid($uuid)->first();
        $notification->is_seen = 'yes';
        $notification->save();

        if (is_null($notification->target_url))
        {
            return redirect(url()->previous());

        } else {
            return redirect($notification->target_url);
        }
    }

    public function readAllNotification(){
        $notifications = Notification::where('user_type', Auth::user()->type)->where('is_seen', 'no')->get();
        foreach ($notifications as $notification){
            $notification->is_seen = 'yes';
            $notification->save();
        }
        return redirect()->back();
    }
}
