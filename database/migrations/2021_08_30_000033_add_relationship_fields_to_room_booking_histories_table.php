<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRoomBookingHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('room_booking_histories', function (Blueprint $table) {
            $table->unsignedBigInteger('room_booking_id')->nullable();
            $table->foreign('room_booking_id', 'room_booking_fk_4153673')->references('id')->on('room_bookings');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id', 'room_fk_4153674')->references('id')->on('rooms');
            $table->unsignedBigInteger('start_time_id');
            $table->foreign('start_time_id', 'start_time_fk_4760367')->references('id')->on('room_bookings');
            $table->unsignedBigInteger('end_time_id');
            $table->foreign('end_time_id', 'end_time_fk_4760349')->references('id')->on('room_bookings');
        });
    }
}
