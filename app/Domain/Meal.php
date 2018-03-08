<?php

namespace App\Domain;

use App\Model\Transformer;
use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;

class Meal extends Model
{
    use Translatable;

    public $translatedAttributes = ['title', 'description'];

    public function tags() {
        return $this->belongsToMany('App\Domain\Tag');
    }

    public function category() {
        return $this->belongsTo('App\Domain\Category');
    }

    public function ingredients() {
        return $this->belongsToMany('App\Domain\Ingredient', 'meal_ingredient');
    }

    public function scopeCategoring (Builder $query, $name) {
        return $query->where('category_id', $name);
    }

    public function scopeTaging (Builder $query, $arg) {
        $array = Transformer::transformForScope($arg);
        return $query->whereHas('tags', function ($q) use ($array) {
            $q->whereIn('id', $array);
        });
    }

    public function scopeCategoriesTags (Builder $query, $arg, $arg1) {
        $array = Transformer::transformForScope($arg1);
        return $query->where('category_id', $arg)->where(function($subQuery) use ($array) {
            $subQuery->whereHas('tags', function ($q) use ($array) {
                $q->whereIn('id', $array);
            });
        });
    }
}
