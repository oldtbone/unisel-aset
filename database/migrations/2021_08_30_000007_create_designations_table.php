<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationsTable extends Migration
{
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
