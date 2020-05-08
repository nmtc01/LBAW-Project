<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    
    protected $table = 'vote';

    // ---------------------- what this answer belongs to ----------------------

    /**
    * The user this answer belongs to
    */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
    * The question this vote belongs to
    */
    public function question() {
        return $this->belongsTo('App\Question');
    }

    /**
    * The answer this vote belongs to
    */
    public function answer() {
        return $this->belongsTo('App\Answer');
    }



}
