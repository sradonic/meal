<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    use Translatable, SoftDeletes;

    public $translatedAttributes = ['title', 'description'];

    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Model\Ingredient', 'meal_ingredient');
    }

    public function scopeCategoring(Builder $query, $name)
    {
        return $query->where('category_id', $name);
    }

    public function scopeTaging(Builder $query, $arg)
    {
        $array = explode('AND', $arg);

        return $query->whereHas('tags', function ($q) use ($array) {
            $q->whereIn('id', $array);
        });
    }

    public function scopeGetByDate(Builder $query, $arg)
    {
        return $query->withTrashed()->where('updated_at', '>', $arg)->orWhere('deleted_at', '>', $arg);
    }

    public function getStatusAttribute()
    {
        $status = 'created';

        if($this->deleted_at) {
            $status = 'deleted';
        }

        if($this->updated_at->gt($this->created_at)) {
            $status = 'modified';
        }

        return $status;
    }
}
