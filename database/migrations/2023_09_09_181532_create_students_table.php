<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_study_id')->constrained()->cascadeOnDelete();
            $table->foreignId('level_study_id')->constrained()->cascadeOnDelete();
            $table->string('nim');
            $table->string('name');
            $table->double('ipk');
            $table->string('student_email');
            $table->string('personal_email')->nullable();
            $table->foreignId('approved_job_apply_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
