<?php

namespace App\Http\Controllers\Api\Gender\Catalog\Category\Item\Option\Element;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\Catalog\Category\Item\Option\Element\ModelRequest;
use App\Http\Resources\Gender\Catalog\Category\Item\Option\Element\ModelOfResource;
use App\Http\Resources\Gender\Catalog\Category\Item\Option\Element\ModelResource;
use App\Models\Gender\Catalog\Category\Item\Option\Element\ModelOf;
use App\Service\Resource;

class ModelController extends Controller
{
    use Resource;

    private $request;
    private $resource;
    private $model;

    public function __construct()
    {
        $this->request = new ModelRequest();
        $this->resource = new ModelOfResource($this->request);
        $this->model = new ModelOf();
    }

    public function index(ModelOf $model)
    {
        return $this->serviceIndex($this->resource, $model);
    }

    public function store(ModelRequest $request, ModelOf $model)
    {
        return $this->serviceStore($request, $this->resource, $model);
    }

    public function show(ModelOf $model)
    {
        return $this->serviceShow($this->resource, $model);
    }

    public function update(ModelRequest $request, ModelOf $model)
    {
        return $this->serviceUpdate($request, $this->resource, $model);
    }

    public function destroy(ModelOf $model)
    {
        return $this->serviceDestroy($model);
    }
}
