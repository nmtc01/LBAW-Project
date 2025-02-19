<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    
    protected $table = "user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'bio', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // ---------------------- what this user has ----------------------

    /**
    * 
    * The questions this user has
    */
    public function questions() {
        return $this->hasMany('App\Question');
    }

    /**
    * 
    * The answers this user has
    */
    public function answers() {
        return $this->hasMany('App\Answer');
    }

    /**
    * 
    * The comments this user has
    */
    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function getUserCurrentRole()
    {
        $user_management = UserManagement::where('id', $this->id)->latest('date_last_changed')->first();
        if ($user_management == null)
            $role = 'user';
        else $role = $user_management->status;

        return $role;
    }

    public function listNotifications(){
        $user_notifications = Notification::where('user_id', $this->id)->orderBy('date', 'DESC')->get();
        return $user_notifications;
    }

    public function listNotificationsBell(){
        $user_notifications = Notification::where('user_id', $this->id)->orderBy('date', 'DESC')->orderBy('id', 'DESC')->limit(6)->get();
        return $user_notifications;
    }

    public function hasSeen(){
        $seen = true;
        $user_notifications = Notification::where('user_id', $this->id)->orderBy('date', 'DESC')->limit(6)->get();
        foreach($user_notifications as $user_notification){
            if($user_notification->viewed != 1){
                $seen = false;
            }
        }
        return $seen;
    }

    public function getPopularLabels(){
        return QuestionLabel::select(DB::raw('label_id'))->groupBy('label_id')->orderBy(DB::raw('count(*)'), 'desc')->limit(6)->get();
    }
}
