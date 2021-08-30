<?php

namespace App\Http\Requests;

use App\Models\RoomBooking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRoomBookingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('room_booking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:room_bookings,id',
        ];
    }
}
