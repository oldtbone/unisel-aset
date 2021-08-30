@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.roomBooking.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.room-bookings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.roomBooking.fields.id') }}
                        </th>
                        <td>
                            {{ $roomBooking->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomBooking.fields.room') }}
                        </th>
                        <td>
                            {{ $roomBooking->room->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomBooking.fields.user') }}
                        </th>
                        <td>
                            {{ $roomBooking->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomBooking.fields.title') }}
                        </th>
                        <td>
                            {{ $roomBooking->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomBooking.fields.start_time') }}
                        </th>
                        <td>
                            {{ $roomBooking->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomBooking.fields.end_time') }}
                        </th>
                        <td>
                            {{ $roomBooking->end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomBooking.fields.description') }}
                        </th>
                        <td>
                            {{ $roomBooking->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.room-bookings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection