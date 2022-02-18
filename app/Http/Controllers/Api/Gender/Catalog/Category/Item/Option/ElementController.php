<?php

namespace App\Http\Controllers\Api\Gender\Catalog\Category\Item\Option;

use App\Http\Controllers\Controller;
use App\Models\Gender\Catalog\Category\Item\Option\Element;
use App\Http\Resources\Gender\Catalog\Category\Item\Option\ElementResource;
use App\Http\Requests\Gender\Catalog\Category\Item\Option\ElementRequest;
use App\Service\Resource;

class ElementController extends Controller
{
    use Resource;

    private $request;
    private $resource;
    private $model;

    public function __construct()
    {
        $this->request = new ElementRequest();
        $this->resource = new ElementResource($this->request);
        $this->model = new Element();
    }

    public function index(Element $element)
    {
        return $this->serviceIndex($this->resource, $element);
    }

    public function store(ElementRequest $request, Element $element)
    {
        return $this->serviceStore($request, $this->resource, $element);
    }

    public function show(Element $element)
    {
        return $this->serviceShow($this->resource, $element);
    }

    public function update(ElementRequest $request, Element $element)
    {
        return $this->serviceUpdate($request, $this->resource, $element);
    }

    public function destroy(Element $element)
    {
        return $this->serviceDestroy($element);
    }
}
