<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('student_id');
            $table->string('course_id');
            $table->integer('progress')->default(0);
            $table->json('completed_lectures')->nullable();
            $table->string('last_lecture')->nullable();
            $table->boolean('completed')->default(false);
            $table->date('enrolled_at')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
};
