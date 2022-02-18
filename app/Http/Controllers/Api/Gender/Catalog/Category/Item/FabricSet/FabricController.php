<?php

namespace App\Http\Controllers\Api\Gender\Catalog\Category\Item\FabricSet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\Catalog\Category\Item\FabricSet\FabricRequest;
use App\Http\Resources\Gender\Catalog\Category\Item\FabricSet\FabricResource;
use App\Models\Gender\Catalog\Category\Item\FabricSet\Fabric;
use App\Service\Resource;

class FabricController extends Controller
{
    use Resource;

    private $request;
    private $resource;
    private $model;

    public function __construct()
    {
        $this->request = new FabricRequest();   
        $this->resource = new FabricResource($this->request);
        $this->model = new Fabric();
    }

    public function index(Fabric $element)
    {
        return $this->serviceIndex($this->resource, $element);
    }

    public function store(FabricRequest $request, Fabric $element)
    {
        return $this->serviceStore($request, $this->resource, $element);
    }

    public function show(Fabric $element)
    {
        return $this->serviceShow($this->resource, $element);
    }

    public function update(FabricRequest $request, Fabric $element)
    {
        return $this->serviceUpdate($request, $this->resource, $element);
    }

    public function destroy(Fabric $element)
    {
        return $this->serviceDestroy($element);
    }
}
