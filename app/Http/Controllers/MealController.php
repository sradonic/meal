<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealResource;
use App\Http\Requests\GetMealValidator;
use App\Services\MealInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MealController extends Controller
{
    /**
     * MealController constructor.
     */
    public function __construct(MealInterface $mealInterface)
    {
        $this->mealInterface = $mealInterface;
    }

    public function index(GetMealValidator $request, $locale)
    {
        app()->setLocale($locale);

        $meals = $this->mealInterface->index($request);

        return $this->transformWithPagination($meals, MealResource::class);
    }
}
