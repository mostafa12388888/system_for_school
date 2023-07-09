<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
// use App\Models\Degree;
class Quizze extends Model
{
    use HasFactory,HasTranslations;
    protected $translatable=['name'];
    protected $guarded=[];
    public function teacher(){
        return $this->belongsTo(teacher::class,'teacher_id','id');
    }
    public function grade(){
        return $this->belongsTo(Grate::class,'grade_id','id');
    }
    public function classroom(){
        return $this->belongsTo(Classrom::class,'classroom_id','id');
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id','id');}
    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
    public function degree(){
        return $this->hasMany(Degree::class,'quizze_id','id');
    }
    // public function degree()
    // {
    //     return $this->hasMany('App\Models\Degree');
    // }
}
