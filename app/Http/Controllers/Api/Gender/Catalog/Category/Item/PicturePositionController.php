<?php

namespace App\Http\Controllers\Api\Gender\Catalog\Category\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\Catalog\Category\Item\PicturePositionRequest;
use App\Http\Resources\Gender\Catalog\Category\Item\PicturePositionResource;
use App\Models\Gender\Catalog\Category\Item\PicturePosition;

class PicturePositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PicturePositionResource::collection(PicturePosition::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PicturePositionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PicturePositionRequest $request)
    {
        //dd($request->all());
        $feature = PicturePosition::create($request->validated());
        return new PicturePositionResource($feature);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gender\Catalog\Category\Item\PicturePosition\PicturePosition  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(PicturePosition $feature)
    {
        return new PicturePositionResource($feature);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PicturePositionRequest  $request
     * @param  \App\Models\Gender\Catalog\Category\Item\PicturePosition\PicturePosition  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(PicturePositionRequest $request, PicturePosition $feature)
    {
        $feature->update($request->validated());
        return new PicturePositionResource($feature);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gender\Catalog\Category\Item\PicturePosition\PicturePosition  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(PicturePosition $feature)
    {
        $feature->delete();
        return response()->noContent();
    }
}
