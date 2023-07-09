<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_student extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
    public function student_account(){
        return $this->hasMany(Student_Accounts::class,'id','Payment_id');
    }
}
