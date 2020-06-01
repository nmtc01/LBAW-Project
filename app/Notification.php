<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    
    protected $table = 'notification';

    // ---------------------- what this question belongs to ----------------------

    /**
    * The user this question belongs to
    */
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function create($content, $user_id){
        error_log("heeheheh");
        return "hey";
    }

}