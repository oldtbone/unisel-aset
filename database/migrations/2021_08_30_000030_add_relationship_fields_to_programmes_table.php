<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProgrammesTable extends Migration
{
    public function up()
    {
        Schema::table('programmes', function (Blueprint $table) {
            $table->unsignedBigInteger('faculty_id');
            $table->foreign('faculty_id', 'faculty_fk_4153301')->references('id')->on('faculties');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id', 'department_fk_4153302')->references('id')->on('departments');
        });
    }
}
