<?php

namespace App\Http\Controllers\Api\Item\Settings;

use App\Http\Controllers\Controller;
use App\Models\item\settings\Color;
use App\Http\Requests\item\settings\ColorRequest;
use App\Http\Resources\item\settings\ColorResource;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ColorResource::collection(Color::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ColorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request)
    {
        $color = Color::create($request->validated());
        return new ColorResource($color);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item\settings\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        return new ColorResource($color);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ColorRequest  $request
     * @param  \App\Models\item\settings\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(ColorRequest $request, Color $color)
    {
        $color->update($request->validated());
        return new ColorResource($color);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item\settings\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return response()->noContent();
    }
}
