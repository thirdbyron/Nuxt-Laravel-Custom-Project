<?php

namespace App\Http\Controllers\Api\Gender\Catalog\Category\Item\PicturePosition;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\Catalog\Category\Item\PicturePosition\PictureSetRequest;
use App\Http\Resources\Gender\Catalog\Category\Item\PicturePosition\PictureSetResource;
use App\Models\Gender\Catalog\Category\Item\PicturePosition\PictureSet;
use App\Service\Resource;

class PictureSetController extends Controller
{
    
    use Resource;

    private $request;
    private $resource;
    private $model;

    public function __construct()
    {
        $this->request = new PictureSetRequest();
        $this->resource = new PictureSetResource($this->request);
        $this->model = new PictureSet();
    }

    public function index(PictureSet $pictureSet)
    {
        return $this->serviceIndex($this->resource, $pictureSet);
    }

    public function store(PictureSetRequest $request, PictureSet $pictureSet)
    {
        return $this->serviceStore($request, $this->resource, $pictureSet);
    }

    public function show(PictureSet $pictureSet)
    {
        return $this->serviceShow($this->resource, $pictureSet);
    }

    public function update(PictureSetRequest $request, PictureSet $pictureSet)
    {
        return $this->serviceUpdate($request, $this->resource, $pictureSet);
    }

    public function destroy(PictureSet $pictureSet)
    {
        return $this->serviceDestroy($pictureSet);
    }
}
