<?php

namespace App\Services\Impl;

use App\Domain\Meal;
use App\Services\FactoryMealInterface;

class CategoryTagsMealFactory implements FactoryMealInterface
{
    public function sendRequest($request)
    {
        $page = $request->per_page ?: 5;
        $tags = $request->tags;
        $category = $request->category;

        return Meal::with('category', 'tags')->categoriesTags($category, $tags)->paginate($page);
    }
}