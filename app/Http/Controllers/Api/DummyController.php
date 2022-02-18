<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DummyRequest;
use App\Http\Resources\DummyResource;
use App\Models\Dummy;
use App\Service\Resource;

class DummyController extends Controller
{
    
    use Resource;

    private $request;
    private $resource;
    private $model;

    public function __construct()
    {
        $this->request = new DummyRequest();
        $this->resource = new DummyResource($this->request);
        $this->model = new Dummy();
    }

    public function index(Dummy $dummy)
    {
        return $this->serviceIndex($this->resource, $dummy);
    }

    public function store(DummyRequest $request, Dummy $dummy)
    {
        return $this->serviceStore($request, $this->resource, $dummy);
    }

    public function show(Dummy $dummy)
    {
        return $this->serviceShow($this->resource, $dummy);
    }

    public function update(DummyRequest $request, Dummy $dummy)
    {
        return $this->serviceUpdate($request, $this->resource, $dummy);
    }

    public function destroy(Dummy $dummy)
    {
        return $this->serviceDestroy($dummy);
    }
}
