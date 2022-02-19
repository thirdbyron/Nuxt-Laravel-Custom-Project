<?php

namespace App\Http\Requests;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class SizeTableRequest extends FormRequest
{

    use ResourceRequest;


    public function rules()
    {
        //dd($this->all());
        return $this->serviceRules(
            [
                'gender_id' => ['required', 'integer'],
                'image' => ['required', 'string'],
                'name' => ['required', 'string', 'max:50'],
            ],

            [
                'gender_id' => ['integer'],
                'image' => ['string'],
                'name' => ['string', 'max:50'],
            ],
        );
    }
}
