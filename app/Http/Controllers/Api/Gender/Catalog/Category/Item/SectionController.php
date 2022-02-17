<?php

namespace App\Http\Controllers\Api\Gender\Catalog\Category\Item;

use App\Http\Controllers\Controller;
use App\Models\Gender\Catalog\Category\Item\Section;
use App\Http\Requests\Gender\Catalog\Category\Item\SectionRequest;
use App\Http\Resources\Gender\Catalog\Category\Item\SectionResource;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SectionResource::collection(Section::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        $section = Section::create($request->validated());
        return new SectionResource($section);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gender\Catalog\Category\Item\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        return new SectionResource($section);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SectionRequest  $request
     * @param  \App\Models\Gender\Catalog\Category\Item\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(SectionRequest $request, Section $section)
    {
        $section->update($request->validated());
        return new SectionResource($section);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gender\Catalog\Category\Item\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return response()->noContent();
    }
}
