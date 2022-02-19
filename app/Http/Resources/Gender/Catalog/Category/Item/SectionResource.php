<?php

namespace App\Http\Resources\Gender\Catalog\Category\Item;

use App\Http\Resources\Gender\Catalog\Category\Item\Option\ElementResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
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
            'name' => $this->name,
            'elements' => ElementResource::collection($this->elements),
            'options' => OptionResource::collection($this->options),
        ];
    }
}
