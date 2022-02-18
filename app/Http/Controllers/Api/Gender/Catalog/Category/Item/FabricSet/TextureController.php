<?php

namespace App\Http\Controllers\Api\Gender\Catalog\Category\Item\FabricSet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\Catalog\Category\Item\FabricSet\TextureRequest;
use App\Http\Resources\Gender\Catalog\Category\Item\FabricSet\TextureResource;
use App\Models\Gender\Catalog\Category\Item\FabricSet\Texture;
use App\Service\Resource;

class TextureController extends Controller
{
    use Resource;

    private $request;
    private $resource;
    private $model;

    public function __construct()
    {
        $this->request = new TextureRequest();   
        $this->resource = new TextureResource($this->request);
        $this->model = new Texture();
    }

    public function index(Texture $texture)
    {
        return $this->serviceIndex($this->resource, $texture);
    }

    public function store(TextureRequest $request, Texture $texture)
    {
        return $this->serviceStore($request, $this->resource, $texture);
    }

    public function show(Texture $texture)
    {
        return $this->serviceShow($this->resource, $texture);
    }

    public function update(TextureRequest $request, Texture $texture)
    {
        return $this->serviceUpdate($request, $this->resource, $texture);
    }

    public function destroy(Texture $texture)
    {
        return $this->serviceDestroy($texture);
    }
}
