<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionLabel extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    
    protected $table = 'question_label';

    // ---------------------- what this class belongs to ----------------------

    /**
    * The user that is following
    */
    public function question() {
        return $this->belongsTo('App\Question');
    }


}