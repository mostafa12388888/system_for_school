<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
    public function f_grade(){
        return $this->belongsTo(Grate::class,'from_grade','id');
    }
    public function f_classroom(){
        return $this->belongsTo(Classrom::class,'from_classroom','id');
    }
    public function f_section(){
        return $this->belongsTo(Section::class,'from_section','id');
    }
    public function t_grade(){
        return $this->belongsTo(Grate::class,'to_grade','id');
    }
    public function t_classroom(){
        return $this->belongsTo(Classrom::class,'to_classroom','id');
    }
    public function t_section(){
        return $this->belongsTo(Section::class,'to_section','id');
    }
}
