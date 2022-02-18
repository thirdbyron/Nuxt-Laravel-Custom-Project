<?php

namespace App\Http\Requests\Gender\Catalog\Category\Item\FabricSet;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class FabricRequest extends FormRequest
{

    use ResourceRequest;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //dd($this->all());
        return $this->serviceRules(
            [
                'fabric_set_id' => ['required', 'integer'],
                'image_url' => ['required', 'string'],
                'price' => ['integer'],
                'name' => ['required', 'string', 'max:50'],
                'in_stock' => ['required', 'integer', 'max:1'],
                'settings' => ['string', 'max:25'],
                'order_name' => ['required', 'string', 'max:50'],
            ],

            [
                'fabric_set_id' => ['integer'],
                'image_url' => ['string'],
                'price' => ['integer'],
                'name' => ['string', 'max:50'],
                'in_stock' => ['integer', 'max:1'],
                'settings' => ['string', 'max:25'],
                'order_name' => ['string', 'max:50'],
            ],
        );
    }
}
