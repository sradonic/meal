<?php

namespace App\Domain;

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

    public function scopeTaging (Builder $query, $name) {
        if(strpos($name, ',') !== false) {
            $new = str_split($name);
        } else $new = explode(',', $name);
        return $query->whereHas('tags', function ($q) use ($new) {
            $q->whereIn('id', $new);
        });
    }

    public function scopeCategoriesTags (Builder $query, $name, $name2) {
        if(strpos($name2, ',') !== false) {
            $new = str_split($name2);
        } else $new = explode(',', $name2);
        dd($name2);
        return $query->where('category_id', $name)->where(function($subQuery) use ($name2) {
            $subQuery->whereHas('tags', function ($q) use ($name2) {
                $q->whereIn('id', $name2);
            });
        });
    }
}
