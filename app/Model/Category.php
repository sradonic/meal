<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Category extends Model
{
    use Translatable;

    public $translatedAttributes = ['title'];

    public function meal()
    {
        return $this->hasMany('App\Model\Meal');
    }
}
