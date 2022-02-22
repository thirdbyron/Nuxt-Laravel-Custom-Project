<?php

namespace App\Http\Requests\Gender\Catalog\Category\Item\PicturePosition;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class PictureRequest extends FormRequest
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
                'picture_set_id' => ['required', 'integer'],
                'name' => ['required', 'string', 'max:50'],
                'price' => ['required', 'integer'],
                'in_stock' => ['required', 'integer', 'max:1'],
                'is_default' => ['required', 'integer', 'max:1'],
                'order_name' => ['required', 'string', 'max:25'],
                'articule' => ['required', 'string'],
            ],

            [
                'picture_set_id' => ['integer'],
                'name' => ['string', 'max:50'],
                'price' => ['integer'],
                'in_stock' => ['integer', 'max:1'],
                'is_default' => ['integer', 'max:1'],
                'order_name' => ['string', 'max:25'],
                'articule' => ['string'],
            ],
        );
    }
}
