<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('teacher_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('category')->nullable();
            $table->string('level')->nullable();
            $table->integer('price')->default(0);
            $table->string('status')->default('published');
            $table->decimal('rating', 3, 1)->default(0);
            $table->integer('students')->default(0);
            $table->json('tags')->nullable();
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
