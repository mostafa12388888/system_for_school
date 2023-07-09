<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exame extends Model
{
    use HasFactory,HasTranslations;
    protected $translatable=['name'];
protected $guarded=[];
}
