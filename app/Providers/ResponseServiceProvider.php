<?php

namespace App\Providers;

use App\Http\Resources\MealResource;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Routing\ResponseFactory;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        $factory->macro('api', function ($data) use ($factory) {
            $customFormat = [
                'meta' => [
                    'total' => $data->total(),
                    'current_page' => $data->currentPage(),
                    'per_page' => $data->perPage(),
                    'last_page' => $data->lastPage(),
                ],
                'data' => MealResource::collection($data),
                'paginator' => [
                    'previous_page' => $data->previousPageUrl(),
                    'current_page' => $data->url($data->currentPage()),
                    'next_page' => $data->nextPageUrl(),
                ],
            ];
            return $factory->make($customFormat);
        });
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
