<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class fees extends Model
{
    use HasFactory,HasTranslations;
    public $translatable=['title'];
    protected $guarded=[];
    public function classroom(){
        return $this->belongsTo(Classrom::class,'Classroom_id','id');
    }
    public function grade(){
        return $this->belongsTo(Grate::class,'Grade_id','id');
    }
}
