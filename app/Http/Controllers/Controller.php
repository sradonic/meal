<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealResource;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function transformWithPagination($data)
    {
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

        return response()->json($customFormat);
    }
}
