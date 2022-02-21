<?php

namespace App\Http\Controllers\Api\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CreatedItemRequest;
use App\Http\Resources\Cart\CreatedItemResource;
use App\Models\Cart\CreatedItem;
use App\Service\Resource;

class CreatedItemController extends Controller
{
    
    use Resource;

    private $request;
    private $resource;
    private $model;

    public function __construct()
    {
        $this->request = new CreatedItemRequest();
        $this->resource = new CreatedItemResource($this->request);
        $this->model = new CreatedItem();
    }

    public function index(CreatedItem $createdItem)
    {
        return $this->serviceIndex($this->resource, $createdItem);
    }

    public function store(CreatedItemRequest $request, CreatedItem $createdItem)
    {
        return $this->serviceStore($request, $this->resource, $createdItem);
    }

    public function show(CreatedItem $createdItem)
    {
        return $this->serviceShow($this->resource, $createdItem);
    }

    public function update(CreatedItemRequest $request, CreatedItem $createdItem)
    {
        return $this->serviceUpdate($request, $this->resource, $createdItem);
    }

    public function destroy(CreatedItem $createdItem)
    {
        return $this->serviceDestroy($createdItem);
    }
}
