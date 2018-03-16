<?php

namespace App\Http\Resources;

use App\Model\ResourceCheck;
use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'status' => $this->status,
            'category' => $this->when(ResourceCheck::categoriesExists($request), new CategoryResource($this->category)),
            'tags' => $this->when(ResourceCheck::tagsExists($request), TagsResource::collection($this->tags)),
            'ingredients' => $this->when(ResourceCheck::ingredientsExists($request), IngredientsResource::collection($this->ingredients)),
        ];
    }
}
