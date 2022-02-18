<?php

namespace App\Http\Requests\Gender\Catalog\Category\Item;

use App\Service\ResourceRequest;
use Illuminate\Foundation\Http\FormRequest;

class PicturePositionRequest extends FormRequest
{

    use ResourceRequest;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $this->serviceRules(
            [
                'item_id' => ['required', 'integer'],
                'image_url' => ['required', 'string'],
                'name' => ['required', 'string', 'max:50'],
                'relate_to_option' => ['required', 'integer'],
            ],

            [
                'item_id' => ['integer'],
                'image_url' => ['string'],
                'name' => ['string', 'max:50'],
                'relate_to_option' => ['integer'],
            ],
        );
    }
}
