<?php

namespace App\Http\Controllers\Api\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\item\SizeResource;
use App\Models\item\Size;
use App\Http\Requests\item\SizeRequest;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SizeResource::collection(Size::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SizeRequest $request)
    {
        $size = Size::create($request->validated());
        return new SizeResource($size);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        return new SizeResource($size);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SizeRequest  $request
     * @param  \App\Models\item\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(SizeRequest $request, Size $size)
    {
        $size->update($request->validated());
        return new SizeResource($size);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return response()->noContent();
    }
}
