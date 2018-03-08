<?php


namespace App\Model;

use App\Services\Impl\DispatcherFactory;
use Illuminate\Http\Request;
use App\Domain\Meal;

class Dispatcher
{
    public static function apply(Request $filters)
    {
        $dispatcherFactory = new DispatcherFactory();
        $meals = $dispatcherFactory->filter($filters);
        return response()->api($meals);
    }
}