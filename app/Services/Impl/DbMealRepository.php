<?php

namespace App\Services\Impl;

use App\Model\Dispatcher;
use App\Services\MealInterface;

class DbMealRepository implements MealInterface
{

    public function index($request, $locale)
    {
        app()->setLocale($locale);
        return Dispatcher::apply($request);
    }

    public function create($request)
    {
        // TODO: Implement create() method.
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}