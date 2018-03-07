<?php

namespace App\Http\Controllers;

use App\Model\Dispatcher;
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

    public function index(Request $request, $locale)
    {
        $meals = $this->mealInterface->index($request, $locale);
        return $meals;
    }
}
