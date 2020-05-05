<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    
    protected $table = 'question';

    // ---------------------- what this question belongs to ----------------------

    /**
    * The user this question belongs to
    */
    public function user() {
        return $this->belongsTo('App\User');
    }

    // ---------------------- what this question has ----------------------

    /**
    * 
    * The answers this question has
    */
    public function answers() {
        return $this->hasMany('App\Answer');
    }

    /**
    * 
    * The comments this question has
    */
    public function comments() {
        return $this->hasMany('App\Comment');
    }

    /**
    * 
    * The labels this question has
    */
    public function labels() {
        return $this->hasMany('App\Label');
    }

}
