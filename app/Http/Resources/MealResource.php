<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
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
            'category' => $this->when($this->categoriesExsist($request), new CategoryResource($this->category)),
            'tags' => $this->when($this->TagsExsist($request), TagsResource::collection($this->tags)),
            'ingredients' => $this->when($this->IngreditentsExsist($request), IngredientsResource::collection($this->ingredients)),
        ];
    }

    public function categoriesExsist($request) {
        if(strpos($request->with , 'category') !== false) {
            return true;
        }
        return false;
    }

    public function TagsExsist($request) {
        if(strpos($request->with , 'tags') !== false) {
            return true;
        }
        return false;
    }

    public function IngreditentsExsist($request) {
        if(strpos($request->with , 'ingredients') !== false) {
            return true;
        }
        return false;
    }
}
