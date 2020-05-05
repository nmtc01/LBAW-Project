<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    
    protected $table = 'label';

    // ---------------------- what this label belongs to ----------------------

    /**
    * The question this label belongs to
    */
    public function question() {
        return $this->belongsTo('App\Question');
    }

}
