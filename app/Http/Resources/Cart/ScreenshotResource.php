<?php

namespace App\Http\Resources\Cart;

use App\Http\Resources\Gender\CatalogResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ScreenshotResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
