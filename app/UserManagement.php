<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserManagement extends Model
{
    
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    
    protected $table = 'user_management';

    // ---------------------- what this label belongs to ----------------------

    /**
    * The user this user_management belongs to
    */
    public function user() {
        return $this->belongsTo('App\User');
    }

}
