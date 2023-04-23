<?php

namespace App;
use App\UserGiveAnswer;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    public function user_give_answers()
    {
        
        return $this->hasMany(UserGiveAnswer::class);
    }

    public function giveanswer()
    {
        $str = '' ;

        foreach($this->user_give_answers as $giveanswer)
        {
            
            $str .= $giveanswer->give_answer.'-' ;
        }
        return $str ;
    }
}
