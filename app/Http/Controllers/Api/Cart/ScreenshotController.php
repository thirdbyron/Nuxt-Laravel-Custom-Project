<?php

namespace App\Http\Controllers\Api\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\ScreenshotRequest;
use App\Http\Resources\Cart\ScreenshotResource;
use App\Models\Cart\Screenshot;
use App\Service\Resource;

class ScreenshotController extends Controller
{
    
    use Resource;

    private $request;
    private $resource;
    private $model;

    public function __construct()
    {
        $this->request = new ScreenshotRequest();
        $this->resource = new ScreenshotResource($this->request);
        $this->model = new Screenshot();
    }

    public function index(Screenshot $createdItem)
    {
        return $this->serviceIndex($this->resource, $createdItem);
    }

    public function store(ScreenshotRequest $request, Screenshot $createdItem)
    {
        return $this->serviceStore($request, $this->resource, $createdItem);
    }

    public function show(Screenshot $createdItem)
    {
        return $this->serviceShow($this->resource, $createdItem);
    }

    public function update(ScreenshotRequest $request, Screenshot $createdItem)
    {
        return $this->serviceUpdate($request, $this->resource, $createdItem);
    }

    public function destroy(Screenshot $createdItem)
    {
        return $this->serviceDestroy($createdItem);
    }
}
