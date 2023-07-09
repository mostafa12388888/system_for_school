<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;
    protected $fillable=['student_id','grade_id','classroom_id','section_id','teacher_id','attendence_date','attendence_status'];
public function student(){
    return $this->belongsTo(Student::class,'student_id','id');
}
public function section(){
    return $this->belongsTo(Section::class,'section_id','id');
}
public function grade(){
    return $this->belongsTo(Grate::class,'grade_id','id');
}

}
