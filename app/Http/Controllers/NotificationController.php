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

}