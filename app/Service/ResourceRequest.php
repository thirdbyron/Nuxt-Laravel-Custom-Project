<?php

namespace App\Service;

trait ResourceRequest
{
    public function authorize()
    {
        return true;
    }

    public function serviceRules( $notPatch = [], $patch = [] )
    {
        if ($this->method() != 'PATCH')
            return $notPatch;
        else
            return $patch;
    }
}
