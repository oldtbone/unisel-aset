<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomBookingHistory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoomBookingHistoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('room_booking_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roomBookingHistories = RoomBookingHistory::with(['room_booking', 'room', 'start_time', 'end_time'])->get();

        return view('admin.roomBookingHistories.index', compact('roomBookingHistories'));
    }
}
