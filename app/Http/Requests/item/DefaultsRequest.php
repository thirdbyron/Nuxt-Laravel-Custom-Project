<?php

namespace App\Http\Requests\item;

use Illuminate\Foundation\Http\FormRequest;

class DefaultsRequest extends FormRequest
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
            'item_id' => [ 'required', 'integer', ],
            'name' => [ 'required', 'string', 'max:25' ],
            'type' => [ 'required', 'string', 'max:50' ],
            'model_name' => [ 'required', 'string', 'max:25' ],
            'model_type' => [ 'required', 'string', 'max:25' ],
            'model_path' => [ 'required', 'string' ],
            'color' => [ 'required', 'string', 'min:4', 'max:9' ],
            'model_path' => [ 'required', 'string' ]
        ];
    }
}
