<?php

namespace App\Http\Requests\Gender\Catalog\Category\Item\FabricSet;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class FabricModelRequest extends FormRequest
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
                'fabric_set_id' => ['required', 'integer'],
                'model_id' => ['required', 'integer'],
                'fabric_id' => ['required', 'integer'],
            ],

            [
                'fabric_set_id' => ['integer'],
                'model_id' => ['integer'],
                'fabric_id' => ['integer'],
            ],
        );
    }
}
