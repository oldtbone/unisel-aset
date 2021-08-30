<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBookingHistory extends Model
{
    use HasFactory;

    public $table = 'room_booking_histories';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'room_booking_id',
        'room_id',
        'start_time_id',
        'end_time_id',
        'created_at',
        'updated_at',
    ];

    public function room_booking()
    {
        return $this->belongsTo(RoomBooking::class, 'room_booking_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function start_time()
    {
        return $this->belongsTo(RoomBooking::class, 'start_time_id');
    }

    public function end_time()
    {
        return $this->belongsTo(RoomBooking::class, 'end_time_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
