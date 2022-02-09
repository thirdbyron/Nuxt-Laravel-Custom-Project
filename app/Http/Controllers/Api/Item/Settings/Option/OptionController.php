<?php

namespace App\Http\Controllers\Api\Item\Settings\Option;

use App\Http\Controllers\Controller;
use App\Models\item\settings\option\Option;
use App\Http\Requests\item\settings\option\OptionRequest;
use App\Http\Resources\item\settings\option\OptionResource;

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
     * @param  App\Http\Requests\item\settings\option\OptionRequest  $request
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
     * @param  \App\Models\item\settings\option\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        return new OptionResource($option);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\item\settings\option\OptionRequest  $request
     * @param  \App\Models\item\settings\option\Option  $option
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
     * @param  \App\Models\item\settings\option\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return response()->noContent();
    }
}
