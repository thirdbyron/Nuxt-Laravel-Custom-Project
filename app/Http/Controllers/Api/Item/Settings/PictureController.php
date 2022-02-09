<?php

namespace App\Http\Controllers\Api\Item\Settings;

use App\Http\Controllers\Controller;
use App\Models\item\settings\Picture;
use App\Http\Requests\item\settings\PictureRequest;
use App\Http\Resources\item\settings\PictureResource;

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
        $picture = Picture::create($request->validated());
        return new PictureResource($picture);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item\settings\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        return new PictureResource($picture);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PictureRequest  $request
     * @param  \App\Models\item\settings\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(PictureRequest $request, Picture $picture)
    {
        $picture->update($request->validated());
        return new PictureResource($picture);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item\settings\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        $picture->delete();
        return response()->noContent();
    }
}
