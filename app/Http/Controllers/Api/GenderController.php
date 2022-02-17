<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenderResource;
use App\Models\Gender;
use App\Http\Requests\GenderRequest;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GenderResource::collection(Gender::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\GenderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenderRequest $request)
    {
        //dd($request);
        $gender = Gender::create($request->validated());
        return new GenderResource($gender);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function show(Gender $gender)
    {
        return new GenderResource($gender);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\GenderRequest  $request
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function update(GenderRequest $request, Gender $gender)
    {
        $gender->update($request->validated());
        return new GenderResource($gender);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gender $gender)
    {
        $gender->delete();
        return response()->noContent();
    }
}
