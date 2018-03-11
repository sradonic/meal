<?php

namespace App\Services\Impl;

use App\Domain\Meal;
use App\Services\FactoryMealInterface;
use Carbon\Carbon;

class TagsMealFactory implements FactoryMealInterface
{
    protected $meal;

    public function __construct(Meal $meal) {
        $this->meal = $meal;
    }

    public function sendRequest($request)
    {
        $page = $request->per_page ? : 5;
        $tags = $request->tags;
        $time = Carbon::createFromTimestamp($request->diff_time)->toDateTimeString();

        return $this->meal->with('tags')
            ->taging($tags)
            ->getByDate($time)
            ->paginate($page)
            ->appends($request->except('_token'));
    }
}