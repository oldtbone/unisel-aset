@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.programme.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.programmes.update", [$programme->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="code">{{ trans('cruds.programme.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', $programme->code) }}" required>
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.programme.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.programme.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $programme->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.programme.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="faculty_id">{{ trans('cruds.programme.fields.faculty') }}</label>
                            <select class="form-control select2" name="faculty_id" id="faculty_id" required>
                                @foreach($faculties as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('faculty_id') ? old('faculty_id') : $programme->faculty->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('faculty'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('faculty') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.programme.fields.faculty_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="department_id">{{ trans('cruds.programme.fields.department') }}</label>
                            <select class="form-control select2" name="department_id" id="department_id" required>
                                @foreach($departments as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('department_id') ? old('department_id') : $programme->department->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('department'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('department') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.programme.fields.department_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection