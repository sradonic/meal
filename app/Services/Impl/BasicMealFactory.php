<?php

namespace App\Services\Impl;

use App\Domain\Meal;
use App\Services\FactoryMealInterface;
use Carbon\Carbon;

class BasicMealFactory implements FactoryMealInterface
{
    protected $meal;

    public function __construct(Meal $meal) {
        $this->meal = $meal;
    }

    public function sendRequest($request)
    {
        $page = $request->per_page;

        if($request->has('diff_time')) {
            $time = Carbon::createFromTimestamp($request->diff_time)->toDateTimeString();
            $this->meal = $this->meal->getByDate($time);
        }

        return $this->meal->with('category', 'tags')->paginate($page)->appends($request->except('_token'));
    }
}