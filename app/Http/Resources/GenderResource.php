<?php

namespace App\Http\Resources;

use App\Http\Resources\Gender\CatalogResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GenderResource extends JsonResource
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
            'dummy_url' => $this->dummy_url,
            'catalogs' => CatalogResource::collection($this->catalogs),
        ];
    }
}
