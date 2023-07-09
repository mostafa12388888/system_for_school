<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasFactory,HasTranslations;
    protected $translatable=['name'];
    protected $guarded=[];
    public function grade(){
        return $this->belongsTo(Grate::class,'grade_id','id');
    }
    public function classroom(){
        return $this->belongsTo(Classrom::class,'classroom_id','id');
    }
    public function teacher(){
        return $this->belongsTo(teacher::class,'teacher_id','id');
    }
}
