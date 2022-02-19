<?php

namespace App\Http\Controllers\Api\Gender\Catalog\Category\Item\FabricSet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\Catalog\Category\Item\FabricSet\FabricModelRequest;
use App\Http\Resources\Gender\Catalog\Category\Item\FabricSet\FabricModelResource;
use App\Models\Gender\Catalog\Category\Item\FabricSet\FabricModel;
use App\Service\Resource;

class FabricModelController extends Controller
{
    use Resource;

    private $request;
    private $resource;
    private $model;

    public function __construct()
    {
        $this->request = new FabricModelRequest();   
        $this->resource = new FabricModelResource($this->request);
        $this->model = new FabricModel();
    }

    public function index(FabricModel $fabricModel)
    {
        return $this->serviceIndex($this->resource, $fabricModel);
    }

    public function store(FabricModelRequest $request, FabricModel $fabricModel)
    {
        return $this->serviceStore($request, $this->resource, $fabricModel);
    }

    public function show(FabricModel $fabricModel)
    {
        return $this->serviceShow($this->resource, $fabricModel);
    }

    public function update(FabricModelRequest $request, FabricModel $fabricModel)
    {
        return $this->serviceUpdate($request, $this->resource, $fabricModel);
    }

    public function destroy(FabricModel $fabricModel)
    {
        return $this->serviceDestroy($fabricModel);
    }
}
