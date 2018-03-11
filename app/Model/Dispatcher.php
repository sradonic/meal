<?php


namespace App\Model;

use App\Contracts\MealTransformer;
use App\Services\Impl\DispatcherFactory;
use Illuminate\Http\Request;

class Dispatcher
{
    protected $transformer;
    protected $dispatcherFactory;

    /**
     * Dispatcher constructor.
     */
    public function __construct(MealTransformer $transformer, DispatcherFactory $dispatcherFactory)
    {
        $this->transformer = $transformer;
        $this->dispatcherFactory = $dispatcherFactory;
    }

    public function apply(Request $filters)
    {
        $meals = $this->dispatcherFactory->filter($filters);
        $meals = $this->transformer->transform($meals);
        return response()->json($meals);
    }
}