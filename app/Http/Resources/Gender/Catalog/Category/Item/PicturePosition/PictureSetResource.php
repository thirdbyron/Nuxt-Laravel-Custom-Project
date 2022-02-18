<?php

namespace App\Http\Resources\Gender\Catalog\Category\Item\PicturePosition;

use Illuminate\Http\Resources\Json\JsonResource;

class PictureSetResource extends JsonResource
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
            'picture_position_id' => $this->picture_position_id,
            'name' => $this->name,
            'pictures' => PictureResource::collection($this->pictures),
        ];
    }
}
