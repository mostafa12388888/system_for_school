<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classrom;

use App\Models\section;
use App\Models\Grate;
use App\Models\User;
class OlineClasses extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function grade(){
return $this->belongsTo(Grate::class,'Grade_id','id');
    }
    public function classroom(){
        return $this->belongsTo(Classrom::class,'Classrom_id','id');
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    
}
