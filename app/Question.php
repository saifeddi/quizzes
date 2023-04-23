<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getType()
    {
        return ($this->answers()->where('is_valid','1')->count()>1) ? 'checkbox' : 'radio' ;
    }
    public function getCorrectAnswer()
    {
        $str = '';
        foreach( $this->answers()->where('is_valid','1')->get() as $answer  )
        {
            $str .=$answer->answer.'-' ;
        }
        return $str ;
    }
}
