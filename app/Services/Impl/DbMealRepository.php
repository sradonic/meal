<?php

namespace App\Services\Impl;

use App\Domain\Meal;
use App\Services\MealInterface;
use Illuminate\Support\Carbon;

class DbMealRepository implements MealInterface
{
    public function __construct(Meal $meal)
    {
        $this->meal = $meal;
    }

    public function index($request)
    {

        if($request->has('with')) {
            $this->with($request->with);
        }

        if($request->has('category')) {
            $this->category($request->category);
        }

        if($request->has('tags')) {
            $this->tags($request->tags);
        }

        if($request->has('diff_time')) {
            $this->diffTime($request->diff_time);
        }

        return $this->meal
            ->paginate($request->input('per_page', 10))
            ->appends($request->except('_token'));
    }

    public function with($args)
    {
        $this->meal = $this->meal->with(explode(',', $args));
    }

    public function category($category)
    {
        if($category == "NULL")
        {
            $this->meal = $this->meal->with('category')->hasCategory($category);
        }
        else if($category == "!NULL")
        {
            $this->meal = $this->meal->with('category')->doesntHaveCategory($category);
        }
        else {
            $this->meal = $this->meal->with('category')->categoring($category);
        }
    }

    public function tags($tags)
    {
        $this->meal = $this->meal->with('tags')->taging($tags);
    }

    public function diffTime($diff_time)
    {
        $time = Carbon::createFromTimestamp($diff_time)->toDateTimeString();
        $this->meal = $this->meal->getByDate($time);
    }
}