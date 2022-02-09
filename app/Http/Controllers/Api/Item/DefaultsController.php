<?php

namespace App\Http\Controllers\Api\Item;

use App\Http\Controllers\Controller;
use App\Models\item\Defaults;
use App\Http\Requests\item\DefaultsRequest;
use App\Http\Resources\item\DefaultsResource;

class DefaultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DefaultsResource::collection(Defaults::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\DefaultsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DefaultsRequest $request)
    {
        $defaults = Defaults::create($request->validated());
        return new DefaultsResource($defaults);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item\Defaults  $defaults
     * @return \Illuminate\Http\Response
     */
    public function show(Defaults $defaults)
    {
        return new DefaultsResource($defaults);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\DefaultsRequest  $request
     * @param  \App\Models\item\Defaults  $defaults
     * @return \Illuminate\Http\Response
     */
    public function update(DefaultsRequest $request, Defaults $defaults)
    {
        $defaults->update($request->validated());
        return new DefaultsResource($defaults);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item\Defaults  $defaults
     * @return \Illuminate\Http\Response
     */
    public function destroy(Defaults $defaults)
    {
        $defaults->delete();
        return response()->noContent();
    }
}
