<?php

namespace App\Http\Controllers\Api\Gender\Catalog\Category\Item;

use App\Http\Controllers\Controller;
use App\Models\Gender\Catalog\Category\Item\Option;
use App\Http\Requests\Gender\Catalog\Category\Item\OptionRequest;
use App\Http\Resources\Gender\Catalog\Category\Item\OptionResource;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OptionResource::collection(Option::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\OptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionRequest $request)
    {
        $option = Option::create($request->validated());
        return new OptionResource($option);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gender\Catalog\Category\Item\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        return new OptionResource($option);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\OptionRequest  $request
     * @param  \App\Models\Gender\Catalog\Category\Item\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(OptionRequest $request, Option $option)
    {
        $option->update($request->validated());
        return new OptionResource($option);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gender\Catalog\Category\Item\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return response()->noContent();
    }
}
