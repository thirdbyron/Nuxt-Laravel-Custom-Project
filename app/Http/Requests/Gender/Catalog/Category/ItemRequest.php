<?php

namespace App\Http\Requests\Gender\Catalog\Category;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
                'category_id' => ['required', 'integer'],
                'item_type' => ['required', 'string', 'max:25'],
                'short_name' => ['required', 'string', 'max:25'],
                'name' => ['required', 'string', 'max:50'],
                'start_price' => ['required', 'integer'],
                'short_desc' => ['required', 'string', 'max:200'],
                'desc' => ['required', 'string'],
                'image_url' => ['required', 'string'],
                'animation_url' => ['required', 'string'],
                'model_position' => ['required', 'numeric', 'max:3'],
                'in_stock' => ['required', 'boolean'],
            ];
        else
            return [
                'category_id' => ['integer'],
                'item_type' => ['string', 'max:25'],
                'short_name' => ['string', 'max:25'],
                'name' => ['string', 'max:50'],
                'start_price' => ['integer'],
                'short_desc' => ['string', 'max:200'],
                'desc' => ['string'],
                'image_url' => ['string'],
                'animation_url' => ['string'],
                'model_position' => ['numeric', 'max:3'],
                'in_stock' => ['boolean'],
            ];
    }
}
