<?php

namespace App\Http\Requests\Gender\Catalog\Category\Item;

use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
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
                'item_id' => ['required', 'integer'],
                'section_name' => ['required', 'string'],
                'settings' => ['string', 'max:25'],
                'name' => ['required', 'string'],
                'price' => ['integer'],
                'image_url' => ['required', 'string'],
                'in_stock' => ['required', 'boolean'],
                //'order_name' => ['required', 'string'],
            ];
        else
            return [
                'item_id' => ['integer'],
                'section_name' => ['string'],
                'settings' => ['string', 'max:25'],
                'name' => ['string'],
                'price' => ['integer'],
                'image_url' => ['string'],
                'in_stock' => ['boolean'],
                //'order_name' => ['string'],
            ];
    }
}
