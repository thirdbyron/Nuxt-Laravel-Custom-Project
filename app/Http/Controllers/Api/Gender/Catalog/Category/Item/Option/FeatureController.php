<?php

namespace App\Http\Controllers\Api\Gender\Catalog\Category\Item\Option;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\Catalog\Category\Item\Option\FeatureRequest;
use App\Http\Resources\Gender\Catalog\Category\Item\Option\FeatureResource;
use App\Models\Gender\Catalog\Category\Item\Option\Feature;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FeatureResource::collection(Feature::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FeatureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureRequest $request)
    {
        $feature = Feature::create($request->validated());
        return new FeatureResource($feature);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gender\Catalog\Category\Item\Feature\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        return new FeatureResource($feature);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\FeatureRequest  $request
     * @param  \App\Models\Gender\Catalog\Category\Item\Feature\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureRequest $request, Feature $feature)
    {
        $feature->update($request->validated());
        return new FeatureResource($feature);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gender\Catalog\Category\Item\Feature\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();
        return response()->noContent();
    }
}
