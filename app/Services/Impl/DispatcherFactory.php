<?php

namespace App\Services\Impl;

use App\Services\DispatcherInterface;

class DispatcherFactory implements DispatcherInterface
{
    public function __construct(
        CategoryTagsMealFactory $ctmFactory,
        TagsMealFactory $tmFactory,
        CategoryMealFactory $cmFactory,
        BasicMealFactory $bmFactory
    )
    {
        $this->ctmFactory = $ctmFactory;
        $this->tmFactory = $tmFactory;
        $this->cmFactory = $cmFactory;
        $this->bmFactory = $bmFactory;
    }

    public function filter($request) {

        if($request->has('tags') && $request->has('category')) {
            $meals = $this->ctmFactory->sendRequest($request);
        }

        if($request->has('tags') && !$request->has('category')) {
            $meals = $this->tmFactory->sendRequest($request);
        }

        if($request->has('category') && !$request->has('tags'))
        {
            $meals = $this->cmFactory->sendRequest($request);
        }

        if(!$request->has('tags') && !$request->has('category')) {
            $meals = $this->bmFactory->sendRequest($request);
        }

        return $meals;
    }
}