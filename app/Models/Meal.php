<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Meal extends Model
{
    use HasFactory;

    use Translatable;

    protected $fillable = ['category_id','ingredient_id','tag_id'];

    public $translatedAttributes = ['title', 'description'];

    public function translations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MealTranslation::class, 'meal_id', 'id');
    }

    public function tags()
    {
    return $this->belongsToMany(Tag::class, 'meal_tag'/*, 'tag_id', 'meal_id', 'id'*/);
    }

    public function ingredients()
    {
    return $this->belongsToMany(Ingredient::class, 'meal_ingredient'/*, 'ingredient_id', 'meal_id', 'id'*/);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
