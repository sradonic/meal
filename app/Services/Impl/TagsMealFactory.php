<?php

namespace App\Services\Impl;

use App\Domain\Meal;
use App\Services\FactoryMealInterface;

class TagsMealFactory implements FactoryMealInterface
{
    public function sendRequest($request)
    {
        $page = $request->per_page ?: 5;
        $tags = $request->tags;

        return Meal::with('tags')->taging($tags)->paginate($page);
    }
}