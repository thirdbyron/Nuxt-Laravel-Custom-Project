<?php

namespace App\Http\Requests\Gender\Catalog\Category\Item\Option\Element;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class ModelRequest extends FormRequest
{

    use ResourceRequest;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $this->serviceRules(
            [
                'element_id' => ['required', 'integer'],
                'model_name' => ['required', 'string', 'max:50'],
                'model_path' => ['required', 'string'],
                'articule' => ['required', 'string'],
            ],

            [
                'element_id' => ['integer'],
                'model_name' => ['string', 'max:50'],
                'model_path' => ['string'],
                'articule' => ['string'],
            ],
        );
    }
}
