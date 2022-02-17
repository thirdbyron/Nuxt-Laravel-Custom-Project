<?php

namespace App\Http\Resources\Gender\Catalog\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'item_type' => $this->item_type,
            'short_name' => $this->short_name,
            'name' => $this->name,
            'start_price' => $this->start_price,
            'short_desc' => $this->short_desc,
            'desc' => $this->desc,
            'image_url' => $this->image_url,
            'animation_url' => $this->animation_url,
            'model_position' => $this->model_position,
            'in_stock' => $this->in_stock,
        ];
    }
}
