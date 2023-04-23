<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function is_valid()
    {
      
        return ($this->is_valid) ? 'text-success' : 'text-danger' ;
    }
}
