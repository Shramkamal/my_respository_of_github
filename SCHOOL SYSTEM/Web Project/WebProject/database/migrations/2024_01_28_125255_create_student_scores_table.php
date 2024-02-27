<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('student_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->unique(); // Assuming you have a 'students' table with an 'id' column
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->float('kurdish');
            $table->float('arabic');
            $table->float('english');
            $table->float('mathematic');
            $table->float('physic');
            $table->float('chemistry');
            $table->float('biology');
            $table->float('religion');
            $table->float('sport');
            $table->float('art');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_scores');
    }
};
