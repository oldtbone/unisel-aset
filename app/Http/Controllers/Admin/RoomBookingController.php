<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoomBookingRequest;
use App\Http\Requests\StoreRoomBookingRequest;
use App\Http\Requests\UpdateRoomBookingRequest;
use App\Models\Room;
use App\Models\RoomBooking;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoomBookingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('room_booking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roomBookings = RoomBooking::with(['room', 'user'])->get();

        return view('admin.roomBookings.index', compact('roomBookings'));
    }

    public function create()
    {
        abort_if(Gate::denies('room_booking_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rooms = Room::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.roomBookings.create', compact('rooms', 'users'));
    }

    public function store(StoreRoomBookingRequest $request)
    {
        $roomBooking = RoomBooking::create($request->all());

        return redirect()->route('admin.room-bookings.index');
    }

    public function edit(RoomBooking $roomBooking)
    {
        abort_if(Gate::denies('room_booking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rooms = Room::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roomBooking->load('room', 'user');

        return view('admin.roomBookings.edit', compact('rooms', 'users', 'roomBooking'));
    }

    public function update(UpdateRoomBookingRequest $request, RoomBooking $roomBooking)
    {
        $roomBooking->update($request->all());

        return redirect()->route('admin.room-bookings.index');
    }

    public function show(RoomBooking $roomBooking)
    {
        abort_if(Gate::denies('room_booking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roomBooking->load('room', 'user');

        return view('admin.roomBookings.show', compact('roomBooking'));
    }

    public function destroy(RoomBooking $roomBooking)
    {
        abort_if(Gate::denies('room_booking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roomBooking->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoomBookingRequest $request)
    {
        RoomBooking::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
