<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Notification;

class NotificationController extends Controller
{

    public function __construct(){
        $this->userController = new UserController();
    }

    public function update(){

        $user_notifications = Notification::where('user_id', Auth::user()->id)->orderBy('date', 'DESC')->get();

        foreach($user_notifications as $notification){
            $notification->viewed = 1;
            $notification->save();
        }


    }

}