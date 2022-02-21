<?php

namespace App\Http\Requests\Cart;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreatedItemRequest extends FormRequest
{

    use ResourceRequest;


    public function rules()
    {
        //dd($this->all());
        return $this->serviceRules(
            [
                'user_id' => ['required', 'integer'],
                'screenshot_id' => ['required', 'integer'],
                'category_id' => ['required', 'integer'],
                'gender_id' => ['required', 'integer'],
                'total_price' => ['required', 'integer'],
            ],

            [
                'user_id' => ['integer'],
                'screenshot_id' => ['integer'],
                'category_id' => ['integer'],
                'gender_id' => ['integer'],
                'total_price' => ['integer'],
            ],
        );
    }
}
