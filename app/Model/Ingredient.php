<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Ingredient extends Model
{
    use Translatable;

    public $translatedAttributes = ['title'];

    public function meal()
    {
        return $this->belongsToMany('App\Model\Meal', 'meal_ingredient');
    }
}
