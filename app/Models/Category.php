<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{
    use HasFactory;

    use Translatable;

    
    protected $fillable = ['slug'];

    public $translatedAttributes = ['title'];

    public function translations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CategoryTranslation::class, 'category_id', 'id');
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
    
}
