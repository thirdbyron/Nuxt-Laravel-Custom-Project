<?php

namespace App\Http\Controllers\Api\Gender\Catalog\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\Catalog\Category\ItemRequest;
use App\Http\Resources\Gender\Catalog\Category\ItemResource;
use App\Models\Gender\Catalog\Category\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ItemResource::collection(Item::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $item = Item::create($request->validated());
        return new ItemResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gender\Catalog\Category\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return new ItemResource($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ItemRequest  $request
     * @param  \App\Models\Gender\Catalog\Category\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, Item $item)
    {
        $item->update($request->validated());
        return new ItemResource($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gender\Catalog\Category\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return response()->noContent();
    }
}
