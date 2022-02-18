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
        //dd($this->all());
        return $this->serviceRules(
            [
                'element_id' => ['required', 'integer'],
                'model_name' => ['required', 'max:50'],
                'model_path' => ['required', 'string'],
            ],

            [
                'element_id' => ['integer'],
                'model_name' => ['max:50'],
                'model_path' => ['string'],
            ],
        );
    }
}
