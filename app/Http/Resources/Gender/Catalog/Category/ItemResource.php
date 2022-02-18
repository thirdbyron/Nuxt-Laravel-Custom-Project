<?php

namespace App\Http\Resources\Gender\Catalog\Category;

use App\Http\Resources\Gender\Catalog\Category\Item\FabricSetResource;
use App\Http\Resources\Gender\Catalog\Category\Item\OptionResource;
use App\Http\Resources\Gender\Catalog\Category\Item\SectionResource;
use App\Http\Resources\Gender\Catalog\Category\Item\SizeResource;
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
            'id' => $this->id,
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
            'settings' => [
                'sizes' => SizeResource::collection($this->sizes),
                'sections' => SectionResource::collection($this->sections),
                'options' => OptionResource::collection($this->options),
                'fabric_sets' => FabricSetResource::collection($this->fabricSets),
            ],
        ];
    }
}
