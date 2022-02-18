<?php

namespace App\Http\Resources\Gender\Catalog\Category\Item;

use App\Http\Resources\Gender\Catalog\Category\Item\Option\FeatureResource;
use App\Http\Resources\Gender\Catalog\Category\Item\PicturePosition\PictureSetResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PicturePositionResource extends JsonResource
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
            'item_id' => $this->item_id,
            'name' => $this->name,
            'image_url' => $this->image_url,
            'relate_to_option' => $this->relate_to_option,
            'picture_sets' => PictureSetResource::collection($this->pictureSets),
        ];
    }
}
