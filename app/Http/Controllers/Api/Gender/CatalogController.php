<?php

namespace App\Http\Controllers\Api\Gender;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\CatalogRequest;
use App\Http\Resources\Gender\CatalogResource;
use App\Models\Gender\Catalog;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CatalogResource::collection(Catalog::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CatalogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatalogRequest $request)
    {
        $catalog = Catalog::create($request->validated());
        return new CatalogResource($catalog);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalog\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $catalog)
    {
        return new CatalogResource($catalog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CatalogRequest  $request
     * @param  \App\Models\Catalog\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(CatalogRequest $request, Catalog $catalog)
    {
        $catalog->update($request->validated());
        return new CatalogResource($catalog);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalog\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalog $catalog)
    {
        $catalog->delete();
        return response()->noContent();
    }
}
