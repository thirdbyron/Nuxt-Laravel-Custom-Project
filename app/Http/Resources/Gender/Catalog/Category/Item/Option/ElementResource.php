<?php

namespace App\Http\Resources\Gender\Catalog\Category\Item\Option;

use App\Http\Resources\Gender\Catalog\Category\Item\Option\Element\ModelOfResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ElementResource extends JsonResource
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
            'option_id' => $this->option_id,
            'feature_id' => $this->feature_id,
            'is_default' => $this->is_default,
            'models' => ModelOfResource::collection($this->modelOfs),
        ];
    }
}
