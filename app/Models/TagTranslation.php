<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Astrotomic\Translatable\Translatable;

class TagTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['title'];
    public $translatedAttributes = ['title'];
}
