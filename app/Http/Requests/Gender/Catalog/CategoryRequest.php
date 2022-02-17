<?php

namespace App\Http\Requests\Gender\Catalog;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if ($this->method() != 'PATCH') {
            return [
                'catalog_id' => ['required', 'integer'],
                'category_name' => ['required', 'string', 'max:25'],
            ];
        } else {
            return [
                'catalog_id' => ['integer'],
                'category_name' => ['string', 'max:25'],
            ];
        }
    }
}
