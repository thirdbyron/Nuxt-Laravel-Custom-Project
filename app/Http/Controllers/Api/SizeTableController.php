<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SizeTable;
use App\Http\Requests\SizeTableRequest;
use App\Http\Resources\SizeTableResource;
use App\Service\Resource;

class SizeTableController extends Controller
{
    
    use Resource;

    private $request;
    private $resource;
    private $model;

    public function __construct()
    {
        $this->request = new SizeTableRequest();
        $this->resource = new SizeTableResource($this->request);
        $this->model = new SizeTable();
    }

    public function index(SizeTable $sizeTable)
    {
        return $this->serviceIndex($this->resource, $sizeTable);
    }

    public function store(SizeTableRequest $request, SizeTable $sizeTable)
    {
        return $this->serviceStore($request, $this->resource, $sizeTable);
    }

    public function show(SizeTable $sizeTable)
    {
        return $this->serviceShow($this->resource, $sizeTable);
    }

    public function update(SizeTableRequest $request, SizeTable $sizeTable)
    {
        return $this->serviceUpdate($request, $this->resource, $sizeTable);
    }

    public function destroy(SizeTable $sizeTable)
    {
        return $this->serviceDestroy($sizeTable);
    }
}
