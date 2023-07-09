<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\Guard;
use Spatie\Translatable\HasTranslations;
use Symfony\Component\Translation\Command\TranslationTrait;
use App\Models\Classrom;
use App\Models\Section;
use App\Models\Image;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\National;
use App\Models\Student_Accounts;
use App\Models\attendance;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Authenticatable
{
    
    use HasFactory,HasTranslations,SoftDeletes;
 protected $table='students';
    public $translatable=['name'];
    protected $guarded=[];
   
    public function gender(){
        return $this->belongsTo(Gender::class,'gender_id','id');
    }
    public function grade(){
        return $this->belongsTo(Grate::class,'Grade_id');
    }
    public function classroom(){
        return $this->belongsTo(Classrom::class,'Classroom_id','id');
    }
    public function section(){
        return $this->belongsTo(section::class,'section_id','id');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function Nationality(){
        return $this->belongsTo(National::class,'nationalitie_id','id');
    }
    public function myparent(){
        return $this->belongsTo(My_parnt::class,'parent_id','id');
    }
    public function student_account(){
        return $this->hasMany(Student_Accounts::class,'id','student_id');
    }
    public function attendance()
    {
        return $this->hasMany(attendance::class,'student_id');
    }
    // public function attendance()
    // {
    //     return $this->hasMany('App\Models\attendance', 'student_id');
    // }


}
