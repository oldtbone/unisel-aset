<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRoomBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('room_bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id', 'room_fk_4153650')->references('id')->on('rooms');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4153651')->references('id')->on('users');
        });
    }
}
