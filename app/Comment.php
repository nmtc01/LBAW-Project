<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    
    protected $table = 'comment';

    // ---------------------- what this comment belongs to ----------------------

    /**
    * The user this answer belongs to
    */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
    * The question this answer belongs to
    */
    public function question() {
        return $this->belongsTo('App\Question');
    }

}
