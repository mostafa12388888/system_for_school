<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\National;
use Illuminate\Foundation\Auth\User as Authenticatable;
class My_parnt extends Authenticatable
{
    use HasFactory,HasTranslations;
    public $translatable=['Name_mather','Name_father','job_father','job_mather'];
    protected $guarded=[];
    public function national(){
        return $this->belongsTo(National::class,'National_id_father','id');
    }
}
