<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\teacher;
use App\Models\Grate;


class Section extends Model
{
    use HasFactory,HasTranslations;
    protected $fillable=['Grate_id ','section_name','status','class_id'];
    public $translatable=['section_name'];
    public function class(){
        return $this->belongsTo(Classrom::class,'class_id','id');
    }
    // 	 	
  public function teacher(){
    return $this->belongsToMany(teacher::class,'teachers_sections','sections_id','teachers_id');
  }
  public function Grades(){
    return $this->belongsTo(Grate::class,'Grate_id');
  }
  // public function section(){
  //   return $this->belongsTo(Grate::class,'Grate_id ','id');
  // }
  
}
