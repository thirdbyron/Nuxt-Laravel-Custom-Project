<?php

namespace App\Http\Requests\Gender;

use Illuminate\Foundation\Http\FormRequest;

class CatalogRequest extends FormRequest
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
                'gender_id' => ['required', 'integer'],
                'name' => ['required', 'string'],
            ];
        } else {
            return [
                'gender_id' => ['integer'],
                'name' => ['string'],
            ];
        }
    }
}
