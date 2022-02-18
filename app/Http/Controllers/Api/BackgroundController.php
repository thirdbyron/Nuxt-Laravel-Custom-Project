<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackgroundRequest;
use App\Http\Resources\BackgroundResource;
use App\Models\Background;
use App\Service\Resource;

class BackgroundController extends Controller
{
    
    use Resource;

    private $request;
    private $resource;
    private $model;

    public function __construct()
    {
        $this->request = new BackgroundRequest();
        $this->resource = new BackgroundResource($this->request);
        $this->model = new Background();
    }

    public function index(Background $pictureSet)
    {
        return $this->serviceIndex($this->resource, $pictureSet);
    }

    public function store(BackgroundRequest $request, Background $pictureSet)
    {
        return $this->serviceStore($request, $this->resource, $pictureSet);
    }

    public function show(Background $pictureSet)
    {
        return $this->serviceShow($this->resource, $pictureSet);
    }

    public function update(BackgroundRequest $request, Background $pictureSet)
    {
        return $this->serviceUpdate($request, $this->resource, $pictureSet);
    }

    public function destroy(Background $pictureSet)
    {
        return $this->serviceDestroy($pictureSet);
    }
}
