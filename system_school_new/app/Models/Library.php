<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grate;
use App\Models\teacher;
use App\Models\section;
use App\Models\Classrom;

class Library extends Model
{
    use HasFactory;
    protected $table='librarie';
    protected $guarded=[];
   public function teacher(){
    return $this->belongsTo(teacher::class,'teacher_id','id');
   }
   public function section(){
    return $this->belongsTo(section::class,'section_id','id');
   }
   public function classroom(){
    return $this->belongsTo(Classrom::class,'Classrom_id','id');
   }
   public function grade(){
    return $this->belongsTo(Grate::class,'Grade_id','id');
   }
}
