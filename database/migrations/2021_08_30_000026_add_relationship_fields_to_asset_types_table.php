<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssetTypesTable extends Migration
{
    public function up()
    {
        Schema::table('asset_types', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_4153323')->references('id')->on('asset_categories');
        });
    }
}
