<?php

namespace App\Http\Requests\Cart;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class SelectedSettingRequest extends FormRequest
{

    use ResourceRequest;


    public function rules()
    {
        //dd($this->all());
        return $this->serviceRules(
            [
                'created_item_id' => ['required', 'integer'],
                'setting_id' => ['required', 'integer'],
                'setting_entity_name' => ['required', 'string'],
            ],

            [
                'created_item_id' => ['integer'],
                'setting_id' => ['integer'],
                'setting_entity_name' => ['string'],
            ],
        );
    }
}
