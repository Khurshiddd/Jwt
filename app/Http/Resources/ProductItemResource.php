<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'produc_category_id'=>$this->produc_category_id,
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
            'sizes'=>  ProductItemSizeResource::collection($this->sizes),
            'colors'=>  ProductItemColorResource::collection($this->colors),
        ];
    }
}
