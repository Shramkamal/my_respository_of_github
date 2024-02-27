<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->string('location');
            $table->string('father_mobile_number');
            $table->string('mother_mobile_number');
            $table->string('father_work');
            $table->string('mother_work');
            $table->string('chronic_disease')->nullable();
            $table->string('blood_group');
            $table->string('father_education_level');
            $table->integer('student_Level');
            $table->string('class');
            $table->text('note')->nullable();
            $table->unsignedBigInteger('level_of_education_id'); // Foreign key column
            $table->timestamps();

            // Foreign key relationship
            $table->foreign('level_of_education_id')->references('id')->on('levelofeducations')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};




