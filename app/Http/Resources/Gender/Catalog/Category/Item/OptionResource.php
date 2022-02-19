<?php

namespace App\Http\Resources\Gender\Catalog\Category\Item;

use App\Http\Resources\Gender\Catalog\Category\Item\Option\ElementResource;
use App\Http\Resources\Gender\Catalog\Category\Item\Option\FeatureResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
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
            'settings' => $this->settings,
            'name' => $this->name,
            'price' => $this->price,
            'image_url' => $this->image_url,
            'in_stock' => $this->in_stock,
            'image_url' => $this->image_url,
            'order_name' => $this->order_name,
            'features' => FeatureResource::collection($this->features),
        ];
    }
}
