<?php

namespace App\Domain;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Tag extends Model
{
    use Translatable;

    public $translatedAttributes = ['title'];

    public function meal() {
        return $this->belongsToMany('App\Domain\Meal');
    }
}
