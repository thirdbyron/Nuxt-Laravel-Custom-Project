<?php

namespace App\Http\Requests;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class BackgroundRequest extends FormRequest
{

    use ResourceRequest;


    public function rules()
    {
        //dd($this->all());
        return $this->serviceRules(
            [
                'name' => ['required', 'string', 'max:25'],
                'image_url' => ['required', 'string'],
            ],

            [
                'name' => ['string', 'max:25'],
                'image_url' => ['string'],
            ],
        );
    }
}
