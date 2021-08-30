<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssetModelsTable extends Migration
{
    public function up()
    {
        Schema::table('asset_models', function (Blueprint $table) {
            $table->unsignedBigInteger('asset_type_id');
            $table->foreign('asset_type_id', 'asset_type_fk_4153329')->references('id')->on('asset_types');
        });
    }
}
