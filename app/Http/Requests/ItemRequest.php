<?php

namespace App\Http\Requests;

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
        return [
            'category_id' => [ 'required', 'integer', ],
            'short_name' => [ 'required', 'string', 'max:25' ],
            'name' => [ 'required', 'string', 'max:50' ],
            'start_price' => [ 'required', 'integer' ],
            'short_desc' => [ 'required', 'string', 'max:100'],
            'desc' => [ 'required', 'string' ],
            'image_url' => [ 'required', 'string' ],
            'animation_url' => [ 'string' ],
            'type' => [ 'required', 'string', 'max:25' ],
        ];
    }
}
