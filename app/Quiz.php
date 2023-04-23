<?php

namespace App;
use App\UserAnswer ;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function user_answers()
    {
        
        return $this->hasMany(UserAnswer::class);
    }
}
