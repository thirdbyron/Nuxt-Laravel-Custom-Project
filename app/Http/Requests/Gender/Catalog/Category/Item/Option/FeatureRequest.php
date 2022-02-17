<?php

namespace App\Http\Requests\Gender\Catalog\Category\Item\Option;

use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() != 'PATCH')
            return [
                'option_id' => ['required', 'integer'],
                'name' => ['required', 'string'],
            ];
        else
            return [
                'option_id' => ['integer'],
                'name' => ['string'],
            ];
    }
}
