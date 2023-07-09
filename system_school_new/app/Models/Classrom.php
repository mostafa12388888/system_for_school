<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classrom extends Model
{
    use HasFactory,HasTranslations;
    protected $fillable=['Name_calss','Grate_id'];
    protected $translatable=['Name_Class'];
    public function grateName(){
        return $this->belongsTo(Grate::class,'Grate_id','id');
    }
}
