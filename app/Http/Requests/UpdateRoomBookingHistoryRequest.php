<?php

namespace App\Http\Requests;

use App\Models\RoomBookingHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRoomBookingHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('room_booking_history_edit');
    }

    public function rules()
    {
        return [];
    }
}
