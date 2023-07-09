<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use App\Models\Section;
class Grate extends Model
{
    use HasFactory,HasTranslations ;
    
    public $translatable = ['Name'];
    protected $fillable=['Name','Note'];
    public function sections (){
        return $this->hasMany(Section::class,'Grate_id','id');
    }
   
}
