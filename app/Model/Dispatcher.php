<?php


namespace App\Model;

use Illuminate\Http\Request;
use App\Domain\Meal;

class Dispatcher
{
    public static function apply(Request $filters)
    {
        $per_page = $filters->input('per_page') ?: 5;

        if ($filters->has('category')) {
            if ($filters->has('tags')) {
                $meals = Meal::with('category', 'tags')->categoriesTags($filters->input('category'), $filters->input('tags'))->paginate($per_page);
            }
            $meals = Meal::with('category')->categoring($filters->input('category'))->paginate($per_page);
        }

        if ($filters->has('tags')) {
            if ($filters->has('category')) {
                $meals = Meal::with('category', 'tags')->categoriesTags($filters->input('category'))->paginate($per_page);
            }
            $meals = Meal::with('tags')->taging($filters->input('tags'))->paginate($per_page);
        }

        else if(!$filters->has('tags') && !$filters->has('category')) {
            $meals = Meal::with('category', 'tags')->paginate($per_page);
        }

        return response()->api($meals);
    }
}