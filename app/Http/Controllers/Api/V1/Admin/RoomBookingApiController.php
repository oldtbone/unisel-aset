<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomBookingRequest;
use App\Http\Requests\UpdateRoomBookingRequest;
use App\Http\Resources\Admin\RoomBookingResource;
use App\Models\RoomBooking;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoomBookingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('room_booking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RoomBookingResource(RoomBooking::with(['room', 'user'])->get());
    }

    public function store(StoreRoomBookingRequest $request)
    {
        $roomBooking = RoomBooking::create($request->all());

        return (new RoomBookingResource($roomBooking))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RoomBooking $roomBooking)
    {
        abort_if(Gate::denies('room_booking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RoomBookingResource($roomBooking->load(['room', 'user']));
    }

    public function update(UpdateRoomBookingRequest $request, RoomBooking $roomBooking)
    {
        $roomBooking->update($request->all());

        return (new RoomBookingResource($roomBooking))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RoomBooking $roomBooking)
    {
        abort_if(Gate::denies('room_booking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roomBooking->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
