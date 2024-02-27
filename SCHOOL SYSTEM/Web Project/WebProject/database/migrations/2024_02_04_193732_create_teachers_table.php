<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curriculas_id')->unique(); // Assuming you have a 'students' table with an 'id' column
            $table->foreign('curriculas_id')->references('id')->on('curriculas')->onDelete('cascade');
            $table->string('TeacherName');
            $table->string('MobileNumber');
            $table->string('SecurityCode');
            $table->string('NationalCardNumber');
            $table->string('BloodGroup');
            $table->string('LevelOfEducation');
            $table->date('InstallationDate');
            $table->text('StudyMaterials')->nullable();
            $table->text('TeachersAssessment')->nullable();
            $table->text('HonoraryAward')->nullable();
            $table->integer('TeacherActivity')->nullable();
            $table->string('Certificate');
            $table->text('Note')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
