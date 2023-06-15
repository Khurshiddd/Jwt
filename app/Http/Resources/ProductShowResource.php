<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductShowResource extends JsonResource
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
            // 'user'=> UserResource::collection($this->user)
        ];
    }
}
