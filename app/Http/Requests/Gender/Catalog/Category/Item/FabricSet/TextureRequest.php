<?php

namespace App\Http\Requests\Gender\Catalog\Category\Item\FabricSet;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class TextureRequest extends FormRequest
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
                'fabric_model_id' => ['required', 'integer'],
                'dummy_id' => ['required', 'integer'],
                'texture_path' => ['required', 'string'],
                'texture_name' => ['required', 'string', 'max:50'],
                'texture_mimetype' => ['required', 'string', 'max:10'],
                'articule' => ['required', 'string'],
            ],

            [
                'fabric_model_id' => ['integer'],
                'dummy_id' => ['integer'],
                'texture_path' => ['string'],
                'texture_name' => ['string', 'max:50'],
                'texture_mimetype' => ['string', 'max:10'],
                'articule' => ['string'],
            ],
        );
    }
}
