<?php

namespace App\Http\Requests\Gender\Catalog\Category\Item;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class FabricSetRequest extends FormRequest
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
                'item_id' => ['required', 'integer'],
                'name' => ['required', 'string', 'max:50'],
                'relate_to_option' => ['string', 'max:50'],
            ],

            [
                'item_id' => ['integer'],
                'name' => ['string', 'max:50'],
                'relate_to_option' => ['string', 'max:50'],
            ],
        );
    }
}
