<?php

namespace App\Http\Requests\Cart;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class ScreenshotRequest extends FormRequest
{

    use ResourceRequest;


    public function rules()
    {
        //dd($this->all());
        return $this->serviceRules(
            [
                'user_id' => ['required', 'integer'],
                'front_image_url' => ['required', 'string'],
                'back_image_url' => ['required', 'string'],
                'left_image_url' => ['required', 'string'],
                'right_image_url' => ['required', 'string'],
            ],

            [
                'user_id' => ['integer'],
                'front_image_url' => ['string'],
                'back_image_url' => ['string'],
                'left_image_url' => ['string'],
                'right_image_url' => ['string'],
            ],
        );
    }
}
