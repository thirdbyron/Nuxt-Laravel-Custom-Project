<?php

namespace App\Http\Resources\Gender\Catalog\Category\Item;

use App\Http\Resources\Gender\Catalog\Category\Item\FabricSet\FabricModelResource;
use App\Http\Resources\Gender\Catalog\Category\Item\FabricSet\FabricResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FabricSetResource extends JsonResource
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
            'name' => $this->name,
            'relate_to_option' => $this->relate_to_option,
            'fabrics' => FabricResource::collection($this->fabrics),
            'fabric_models' => FabricModelResource::collection($this->fabricModels),
        ];
    }
}
