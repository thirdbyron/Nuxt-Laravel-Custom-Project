<?php

namespace App\Http\Resources\item\settings;

use App\Http\Resources\item\settings\option\OptionResource;
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
            'name' => $this->name,
            'model_name' => $this->model_name,
            'options' => OptionResource::collection($this->options),
        ];
    }
}
