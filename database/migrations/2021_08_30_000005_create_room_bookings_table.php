<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
