<?php

namespace App\Services\Impl;

use App\Domain\Meal;
use App\Services\FactoryMealInterface;
use Carbon\Carbon;

class CategoryMealFactory implements FactoryMealInterface
{
    protected $meal;

    public function __construct(Meal $meal) {
        $this->meal = $meal;
    }

    public function sendRequest($request)
    {
        $page = $request->per_page ? : 5;
        $category = $request->category;
        $time = Carbon::createFromTimestamp($request->diff_time)->toDateTimeString();

        if($category == "NULL")
        {
            $this->meal = $this->meal->with('category')->hasCategory('category');
        }
        if($category == "!NULL")
        {
            $this->meal = $this->meal->with('category')->doesntHaveCategory($category);
        }
        if( (string) ((int) $category) === $category ) {
            $this->meal = $this->meal->with('category')->categoring($category);
        }

        return $this->meal->getByDate($time)->paginate($page)->appends($request->except('_token'));

    }
}