<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\ShowCategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'status' => $this->status,
            'category' => new ShowCategoryResource($this->cat),
            'description' => $this->description,
        ];
    }
}
