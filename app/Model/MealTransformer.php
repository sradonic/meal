<?php

namespace App\Model;

use App\Http\Resources\MealResource;

class MealTransformer
{
    public function transform($data)
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
        return $customFormat;
    }
}