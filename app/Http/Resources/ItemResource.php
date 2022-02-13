<?php

namespace App\Http\Resources;

use App\Http\Resources\item\DefaultsResource;
use App\Http\Resources\item\settings\ColorResource;
use App\Http\Resources\item\settings\ElementResource;
use App\Http\Resources\item\settings\PictureResource;
use App\Http\Resources\item\SizeResource;
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
            'short_name' => $this->short_name,
            'name' => $this->name,
            'start_price' => $this->start_price,
            'short_desc' => $this->short_desc,
            'desc' => $this->desc,
            'image_url' => $this->image_url,
            'animation_url' => $this->animation_url,
            'type' => $this->type,
            'model_position' => $this->model_position,
            'sizes' => SizeResource::collection($this->sizes),
            'defaults' => DefaultsResource::collection($this->defaults),
            'settings' => [
                'elements' => ElementResource::collection($this->elements),
                'colors' => ColorResource::collection($this->colors),
                'pictures' => PictureResource::collection($this->pictures)
            ],
        ];
    }
}
