<?php

namespace App\Services\Impl;

use App\Services\DispatcherInterface;

class DispatcherFactory implements DispatcherInterface
{
    public function filter($request)
    {
        if ($request->has('category'))
        {
            if ($request->has('tags'))
            {
                $categoryTagsMealFactory = new CategoryTagsMealFactory();
                $meals = $categoryTagsMealFactory->sendRequest($request);
            }
            $categoryMealFactory = new CategoryMealFactory();
            $meals = $categoryMealFactory->sendRequest($request);
        }

        if ($request->has('tags')) {
            if ($request->has('category')) {
                $categoryTagsMealFactory = new CategoryTagsMealFactory();
                $meals = $categoryTagsMealFactory->sendRequest($request);
            }
            $tagsMealFactory = new TagsMealFactory();
            $meals = $tagsMealFactory->sendRequest($request);
        }

        else if(!$request->has('tags') && !$request->has('category')) {
            $basicFactory = new BasicMealFactory();
            $meals = $basicFactory->sendRequest($request);
        }
        return $meals;
    }
}