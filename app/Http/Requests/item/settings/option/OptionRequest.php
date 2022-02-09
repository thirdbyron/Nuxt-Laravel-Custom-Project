<?php

namespace App\Http\Requests\item\settings\option;

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
        return [
            'element_id' => [ 'required', 'integer', ],
            'name' => [ 'required', 'string', 'max:25' ],
            'image_url' => [ 'required', 'string', ],
            'model_type' => [ 'required', 'string', 'max:25' ],
        ];
    }
}
