<?php

namespace App\Http\Resources\Gender\Catalog;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //dd($this);
        return [
            'id' => $this->id,
            'category_name' => $this->category_name,
            //'items' => ItemResource::collection($this->items),
        ];
    }
}
