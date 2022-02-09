<?php

namespace App\Http\Controllers\Api\Item\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\item\settings\ElementRequest;
use App\Http\Resources\item\settings\ElementResource;
use App\Models\item\settings\Element;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ElementResource::collection(Element::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ElementRequest $request)
    {
        $element = Element::create($request->validated());
        return new ElementResource($element);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item\settings\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function show(Element $element)
    {
        return new ElementResource($element);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item\settings\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function update(ElementRequest $request, Element $element)
    {
        $element->update($request->validated());
        return new ElementResource($element);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item\settings\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function destroy(Element $element)
    {
        $element->delete();
        return response()->noContent();
    }
}
