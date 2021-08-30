@extends('layouts.admin')
@section('content')
@can('room_booking_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.room-bookings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.roomBooking.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.roomBooking.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RoomBooking">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.roomBooking.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBooking.fields.room') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBooking.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBooking.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBooking.fields.start_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBooking.fields.end_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomBooking.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roomBookings as $key => $roomBooking)
                        <tr data-entry-id="{{ $roomBooking->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $roomBooking->id ?? '' }}
                            </td>
                            <td>
                                {{ $roomBooking->room->name ?? '' }}
                            </td>
                            <td>
                                {{ $roomBooking->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $roomBooking->title ?? '' }}
                            </td>
                            <td>
                                {{ $roomBooking->start_time ?? '' }}
                            </td>
                            <td>
                                {{ $roomBooking->end_time ?? '' }}
                            </td>
                            <td>
                                {{ $roomBooking->description ?? '' }}
                            </td>
                            <td>
                                @can('room_booking_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.room-bookings.show', $roomBooking->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('room_booking_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.room-bookings.edit', $roomBooking->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('room_booking_delete')
                                    <form action="{{ route('admin.room-bookings.destroy', $roomBooking->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

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
@can('room_booking_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.room-bookings.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 2, 'asc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-RoomBooking:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection