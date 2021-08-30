<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRoomsTable extends Migration
{
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->unsignedBigInteger('room_type_id');
            $table->foreign('room_type_id', 'room_type_fk_4153383')->references('id')->on('room_types');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id', 'location_fk_4153384')->references('id')->on('asset_locations');
        });
    }
}
