<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['category_id','ingredient_id','tag_id'];
    public $translatedAttributes = ['title', 'description'];

    public function meal()
    {
        return $this->belongsTo(Meal::class, 'meal_id', 'id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'locale', 'code');
    }

}
