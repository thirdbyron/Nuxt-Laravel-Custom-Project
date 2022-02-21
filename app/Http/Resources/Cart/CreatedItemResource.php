<?php

namespace App\Http\Resources\Cart;

use App\Http\Resources\Gender\CatalogResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CreatedItemResource extends JsonResource
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
            'user_id' => $this->user_id,
            'screenshot_id' => $this->screenshot_id,
            'category_id' => $this->category_id,
            'gender_id' => $this->gender_id,
            'total_price' => $this->total_price,
            'selected_settings' => SelectedSettingResource::collection($this->selectedSettings),
        ];
    }
}
