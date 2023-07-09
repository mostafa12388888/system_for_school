<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee_invoices extends Model
{
    use HasFactory;
    protected $guarded=[];
  
    public function fees(){
        return $this->belongsTo(fees::class,'Fee_id','id');
    }
    public function student(){
        return $this->belongsTo(student::class,'Student_id','id');
    }
    public function grade(){
        return $this->belongsTo(Grate::class,'Grade_id','id');
    }
    public function classroom(){
        return $this->belongsTo(Classrom::class,'classrom_id','id');
    }
   
}
