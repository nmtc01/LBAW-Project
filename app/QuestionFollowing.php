<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionFollowing extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    
    protected $table = 'question_following';

    // ---------------------- what this class belongs to ----------------------

    /**
    * The user that is following
    */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
    * The question that is being followed
    */
    public function question() {
        return $this->belongsTo('App\Question');
    }


}