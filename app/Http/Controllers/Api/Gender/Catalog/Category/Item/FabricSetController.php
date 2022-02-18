<?php

namespace App\Http\Controllers\Api\Gender\Catalog\Category\Item;

use App\Http\Controllers\Controller;
use App\Service\Resource;

use App\Models\Gender\Catalog\Category\Item\FabricSet;
use App\Http\Requests\Gender\Catalog\Category\Item\FabricSetRequest;
use App\Http\Resources\Gender\Catalog\Category\Item\FabricSetResource;

class FabricSetController extends Controller
{
    use Resource;

    private $request;
    private $resource;
    private $model;

    public function __construct()
    {
        $this->request = new FabricSetRequest();
        $this->resource = new FabricSetResource($this->request);
        $this->model = new FabricSet();
    }

    public function index(FabricSet $element)
    {
        return $this->serviceIndex($this->resource, $element);
    }

    public function store(FabricSetRequest $request, FabricSet $element)
    {
        return $this->serviceStore($request, $this->resource, $element);
    }

    public function show(FabricSet $element)
    {
        return $this->serviceShow($this->resource, $element);
    }

    public function update(FabricSetRequest $request, FabricSet $element)
    {
        return $this->serviceUpdate($request, $this->resource, $element);
    }

    public function destroy(FabricSet $element)
    {
        return $this->serviceDestroy($element);
    }
}
