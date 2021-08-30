<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\RoomBookingHistoryResource;
use App\Models\RoomBookingHistory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoomBookingHistoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('room_booking_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RoomBookingHistoryResource(RoomBookingHistory::with(['room_booking', 'room', 'start_time', 'end_time'])->get());
    }
}
