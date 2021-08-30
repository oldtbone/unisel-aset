@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.roomBookingHistory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RoomBookingHistory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.roomBookingHistory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBookingHistory.fields.room_booking') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBooking.fields.end_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBooking.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBookingHistory.fields.room') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBookingHistory.fields.start_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBookingHistory.fields.end_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBooking.fields.end_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBookingHistory.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roomBookingHistories as $key => $roomBookingHistory)
                        <tr data-entry-id="{{ $roomBookingHistory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $roomBookingHistory->id ?? '' }}
                            </td>
                            <td>
                                {{ $roomBookingHistory->room_booking->start_time ?? '' }}
                            </td>
                            <td>
                                {{ $roomBookingHistory->room_booking->end_time ?? '' }}
                            </td>
                            <td>
                                {{ $roomBookingHistory->room_booking->description ?? '' }}
                            </td>
                            <td>
                                {{ $roomBookingHistory->room->name ?? '' }}
                            </td>
                            <td>
                                {{ $roomBookingHistory->start_time->start_time ?? '' }}
                            </td>
                            <td>
                                {{ $roomBookingHistory->end_time->end_time ?? '' }}
                            </td>
                            <td>
                                {{ $roomBookingHistory->end_time->end_time ?? '' }}
                            </td>
                            <td>
                                {{ $roomBookingHistory->created_at ?? '' }}
                            </td>
                            <td>



                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-RoomBookingHistory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection