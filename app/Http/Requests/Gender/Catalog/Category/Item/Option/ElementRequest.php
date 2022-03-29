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
                'section_id' => ['required', 'integer'],
                'features' => ['required', 'integer'],
                'is_default' => ['required', 'integer', 'max:1'],
            ],

            [
                'section_id' => ['integer'],
                'features' => ['integer'],
                'is_default' => ['integer', 'max:1'],
            ],
        );
    }
}
