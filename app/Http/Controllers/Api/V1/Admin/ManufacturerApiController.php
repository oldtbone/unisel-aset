<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManufacturerRequest;
use App\Http\Requests\UpdateManufacturerRequest;
use App\Http\Resources\Admin\ManufacturerResource;
use App\Models\Manufacturer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManufacturerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manufacturer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManufacturerResource(Manufacturer::all());
    }

    public function store(StoreManufacturerRequest $request)
    {
        $manufacturer = Manufacturer::create($request->all());

        return (new ManufacturerResource($manufacturer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Manufacturer $manufacturer)
    {
        abort_if(Gate::denies('manufacturer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManufacturerResource($manufacturer);
    }

    public function update(UpdateManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer->update($request->all());

        return (new ManufacturerResource($manufacturer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Manufacturer $manufacturer)
    {
        abort_if(Gate::denies('manufacturer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manufacturer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
