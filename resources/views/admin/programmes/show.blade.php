@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.programme.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programmes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.programme.fields.id') }}
                        </th>
                        <td>
                            {{ $programme->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programme.fields.code') }}
                        </th>
                        <td>
                            {{ $programme->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programme.fields.name') }}
                        </th>
                        <td>
                            {{ $programme->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programme.fields.faculty') }}
                        </th>
                        <td>
                            {{ $programme->faculty->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.programme.fields.department') }}
                        </th>
                        <td>
                            {{ $programme->department->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programmes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection