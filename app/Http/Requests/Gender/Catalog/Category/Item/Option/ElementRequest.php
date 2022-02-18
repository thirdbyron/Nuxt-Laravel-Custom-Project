<?php

namespace App\Http\Requests\Gender\Catalog\Category\Item\Option;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class ElementRequest extends FormRequest
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
                'option_id' => ['required', 'integer'],
                'feature_id' => ['required', 'integer'],
            ],

            [
                'option_id' => ['integer'],
                'feature_id' => ['integer'],
            ],
        );
    }
}
