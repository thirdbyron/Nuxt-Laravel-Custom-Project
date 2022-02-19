<?php

namespace App\Http\Resources\Gender\Catalog\Category\Item\FabricSet;

use Illuminate\Http\Resources\Json\JsonResource;

class FabricModelResource extends JsonResource
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
            'model_id' => $this->model_id,
            'fabric_id' => $this->fabric_id,
            'textures' => TextureResource::collection($this->textures),
        ];
    }
}
