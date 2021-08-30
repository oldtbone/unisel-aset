<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProgrammeRequest;
use App\Http\Requests\StoreProgrammeRequest;
use App\Http\Requests\UpdateProgrammeRequest;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Programme;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgrammeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('programme_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programmes = Programme::with(['faculty', 'department'])->get();

        return view('frontend.programmes.index', compact('programmes'));
    }

    public function create()
    {
        abort_if(Gate::denies('programme_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faculties = Faculty::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.programmes.create', compact('faculties', 'departments'));
    }

    public function store(StoreProgrammeRequest $request)
    {
        $programme = Programme::create($request->all());

        return redirect()->route('frontend.programmes.index');
    }

    public function edit(Programme $programme)
    {
        abort_if(Gate::denies('programme_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faculties = Faculty::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $programme->load('faculty', 'department');

        return view('frontend.programmes.edit', compact('faculties', 'departments', 'programme'));
    }

    public function update(UpdateProgrammeRequest $request, Programme $programme)
    {
        $programme->update($request->all());

        return redirect()->route('frontend.programmes.index');
    }

    public function show(Programme $programme)
    {
        abort_if(Gate::denies('programme_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programme->load('faculty', 'department');

        return view('frontend.programmes.show', compact('programme'));
    }

    public function destroy(Programme $programme)
    {
        abort_if(Gate::denies('programme_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programme->delete();

        return back();
    }

    public function massDestroy(MassDestroyProgrammeRequest $request)
    {
        Programme::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
