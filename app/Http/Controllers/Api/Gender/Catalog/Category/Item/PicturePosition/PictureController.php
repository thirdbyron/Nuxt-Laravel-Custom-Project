<?php

namespace App\Http\Controllers\Api\Gender\Catalog\Category\Item\PicturePosition;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\Catalog\Category\Item\PicturePosition\PictureRequest;
use App\Http\Resources\Gender\Catalog\Category\Item\PicturePosition\PictureResource;
use App\Models\Gender\Catalog\Category\Item\PicturePosition\Picture;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PictureResource::collection(Picture::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PictureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PictureRequest $request)
    {
        $feature = Picture::create($request->validated());
        return new PictureResource($feature);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gender\Catalog\Category\Item\Picture\Picture  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $feature)
    {
        return new PictureResource($feature);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PictureRequest  $request
     * @param  \App\Models\Gender\Catalog\Category\Item\Picture\Picture  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(PictureRequest $request, Picture $feature)
    {
        $feature->update($request->validated());
        return new PictureResource($feature);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gender\Catalog\Category\Item\Picture\Picture  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $feature)
    {
        $feature->delete();
        return response()->noContent();
    }
}
