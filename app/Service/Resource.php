<?php

namespace App\Service;

trait Resource
{
    public function serviceIndex( $resource, $model )
    {
        return $resource::collection($model::all());
    }

    public function serviceStore($request, $resource, $model)
    {
        $gender = $model::create($request->validated());
        return new $resource($gender);
    }

    public function serviceShow($resource, $model)
    {
        return new $resource($model);
    }

    public function serviceUpdate($request, $resource, $model)
    {
        dd($model->update($request->validated()));
        $model->update($request->validated());
        return new $resource($model);
    }

    public function serviceDestroy($model)
    {
        $model->delete();
        return response()->noContent();
    }
}
