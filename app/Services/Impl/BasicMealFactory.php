<?php

namespace App\Services\Impl;

use App\Domain\Meal;
use App\Services\FactoryMealInterface;

class BasicMealFactory implements FactoryMealInterface
{
    public function sendRequest($request)
    {
        $page = $request->per_page ?: 5;

        return Meal::with('category', 'tags')->paginate($page);
    }
}