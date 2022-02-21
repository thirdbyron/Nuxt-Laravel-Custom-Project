<?php

namespace App\Http\Controllers\Api\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\SelectedSettingRequest;
use App\Http\Resources\Cart\SelectedSettingResource;
use App\Models\Cart\SelectedSetting;
use App\Service\Resource;

class SelectedSettingController extends Controller
{
    
    use Resource;

    private $request;
    private $resource;
    private $model;

    public function __construct()
    {
        $this->request = new SelectedSettingRequest();
        $this->resource = new SelectedSettingResource($this->request);
        $this->model = new SelectedSetting();
    }

    public function index(SelectedSetting $selectedSetting)
    {
        return $this->serviceIndex($this->resource, $selectedSetting);
    }

    public function store(SelectedSettingRequest $request, SelectedSetting $selectedSetting)
    {
        return $this->serviceStore($request, $this->resource, $selectedSetting);
    }

    public function show(SelectedSetting $selectedSetting)
    {
        return $this->serviceShow($this->resource, $selectedSetting);
    }

    public function update(SelectedSettingRequest $request, SelectedSetting $selectedSetting)
    {
        return $this->serviceUpdate($request, $this->resource, $selectedSetting);
    }

    public function destroy(SelectedSetting $selectedSetting)
    {
        return $this->serviceDestroy($selectedSetting);
    }
}
