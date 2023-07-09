<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function quizze(){
        return $this->belongsTo(Quizze::class,'quizze_id','id');
    }
}
