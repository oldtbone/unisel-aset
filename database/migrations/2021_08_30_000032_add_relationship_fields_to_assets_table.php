<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssetsTable extends Migration
{
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_4153265')->references('id')->on('asset_categories');
            $table->unsignedBigInteger('asset_model_id')->nullable();
            $table->foreign('asset_model_id', 'asset_model_fk_4153376')->references('id')->on('asset_models');
            $table->unsignedBigInteger('room_attach_id')->nullable();
            $table->foreign('room_attach_id', 'room_attach_fk_4153390')->references('id')->on('rooms');
            $table->unsignedBigInteger('manufacturer_id')->nullable();
            $table->foreign('manufacturer_id', 'manufacturer_fk_4153377')->references('id')->on('manufacturers');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_4153269')->references('id')->on('asset_statuses');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_4153270')->references('id')->on('asset_locations');
            $table->unsignedBigInteger('assigned_to_id')->nullable();
            $table->foreign('assigned_to_id', 'assigned_to_fk_4153272')->references('id')->on('users');
        });
    }
}
