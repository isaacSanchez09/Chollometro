<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CholloResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
            'category' => $this->category,
            'likes' => $this->likes,
            'unlikes' => $this->unlikes,
            'price' => $this->price,
            'price_sale' => $this->price_sale,
            'available' => $this->available,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
