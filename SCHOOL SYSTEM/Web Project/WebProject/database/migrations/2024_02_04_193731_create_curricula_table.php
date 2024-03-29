<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('curriculas', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name');
            $table->string('level_of_education');
            $table->string('curriculum_upload');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('curriculas'); // Fix the table name here
    }
};
