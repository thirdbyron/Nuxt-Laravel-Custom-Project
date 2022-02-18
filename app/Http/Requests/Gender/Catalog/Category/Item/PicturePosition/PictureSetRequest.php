<?php

namespace App\Http\Requests\Gender\Catalog\Category\Item\PicturePosition;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class PictureSetRequest extends FormRequest
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
                'picture_position_id' => ['required', 'integer'],
                'name' => ['required', 'string'],
            ],

            [
                'picture_position_id' => [ 'integer'],
                'name' => [ 'string', 'max:50'],
            ],
        );
    }
}
