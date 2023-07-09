<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt_Student extends Model
{
    use HasFactory;
    public function student(){
        return $this->belongsTo(Student::class,'Student_id','id');
    }
}
