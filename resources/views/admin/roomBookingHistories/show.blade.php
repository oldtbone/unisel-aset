@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.roomBookingHistory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.room-booking-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.roomBookingHistory.fields.id') }}
                        </th>
                        <td>
                            {{ $roomBookingHistory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomBookingHistory.fields.room_booking') }}
                        </th>
                        <td>
                            {{ $roomBookingHistory->room_booking->start_time ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomBookingHistory.fields.room') }}
                        </th>
                        <td>
                            {{ $roomBookingHistory->room->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomBookingHistory.fields.start_time') }}
                        </th>
                        <td>
                            {{ $roomBookingHistory->start_time->start_time ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomBookingHistory.fields.end_time') }}
                        </th>
                        <td>
                            {{ $roomBookingHistory->end_time->end_time ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomBookingHistory.fields.created_at') }}
                        </th>
                        <td>
                            {{ $roomBookingHistory->created_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.room-booking-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection