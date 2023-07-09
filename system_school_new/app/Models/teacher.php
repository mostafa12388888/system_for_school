<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Gender;
use App\Models\Specialization;
use Illuminate\Foundation\Auth\User as Authenticatable;

class teacher extends Authenticatable
{
    use HasFactory,HasTranslations;
    public $translatable=['Name'];
    protected $fillable=['Name'];
    protected $guarded=[];
    public function genders (){
        return $this->belongsTo(Gender::class,'Gender_id','id');
    }
    public function specializations (){
        return $this->belongsTo(Specialization::class,'Specialization_id','id');
    }
    public function Section(){
        return $this->belongsToMany(Section::class,'teachers_sections','teachers_id','sections_id');
    }
}
