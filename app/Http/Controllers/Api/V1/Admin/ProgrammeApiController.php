<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgrammeRequest;
use App\Http\Requests\UpdateProgrammeRequest;
use App\Http\Resources\Admin\ProgrammeResource;
use App\Models\Programme;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgrammeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('programme_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProgrammeResource(Programme::with(['faculty', 'department'])->get());
    }

    public function store(StoreProgrammeRequest $request)
    {
        $programme = Programme::create($request->all());

        return (new ProgrammeResource($programme))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Programme $programme)
    {
        abort_if(Gate::denies('programme_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProgrammeResource($programme->load(['faculty', 'department']));
    }

    public function update(UpdateProgrammeRequest $request, Programme $programme)
    {
        $programme->update($request->all());

        return (new ProgrammeResource($programme))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Programme $programme)
    {
        abort_if(Gate::denies('programme_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programme->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
