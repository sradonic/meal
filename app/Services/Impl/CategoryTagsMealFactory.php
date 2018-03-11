<?php

namespace App\Services\Impl;

use App\Domain\Meal;
use App\Services\FactoryMealInterface;
use Carbon\Carbon;

class CategoryTagsMealFactory implements FactoryMealInterface
{
    protected $meal;

    public function __construct(Meal $meal) {
        $this->meal = $meal;
    }
    public function sendRequest($request)
    {
        $page = $request->input('per_page', 5);
        $tags = $request->tags;
        $category = $request->category;
        $time = Carbon::createFromTimestamp($request->diff_time)->toDateTimeString();

        if($category == "NULL")
        {
            $this->meal = $this->meal->with('category')->hasCategory($category);
        }
        else if($category == "!NULL")
        {
            $this->meal = $this->meal->with('category')->doesntHaveCategory($category);
        }
        else {
            $this->meal = $this->meal->with('category', 'tags')->categoring($category);
        }

        return $this->meal->getByDate($time)->taging($tags)->paginate($page)->appends($request->except('_token'));
    }
}