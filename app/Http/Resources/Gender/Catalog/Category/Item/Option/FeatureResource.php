<?php

namespace App\Http\Resources\Gender\Catalog\Category\Item\Option;

use Illuminate\Http\Resources\Json\JsonResource;

class FeatureResource extends JsonResource
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
            'name' => $this->name,
        ];
    }
}
