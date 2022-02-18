<?php

namespace App\Http\Requests;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class DummyRequest extends FormRequest
{

    use ResourceRequest;


    public function rules()
    {
        //dd($this->all());
        return $this->serviceRules(
            [
                'gender_id' => ['required', 'integer'],
                'pose_name' => ['required', 'string', 'max:50'],
                'dummy_model' => ['required', 'string'],
            ],

            [
                'gender_id' => ['integer'],
                'pose_name' => ['string', 'max:50'],
                'dummy_model' => ['string'],
            ],
        );
    }
}
