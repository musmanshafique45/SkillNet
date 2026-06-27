<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('teacher_id');
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail')->nullable();
            $table->string('category');
            $table->string('level')->default('Beginner');
            $table->decimal('price', 8, 2)->default(0);
            $table->string('status')->default('draft'); // published, pending, draft, archived, rejected
            $table->decimal('rating', 3, 1)->default(0);
            $table->integer('students')->default(0);
            $table->json('tags')->nullable();
            $table->date('created_at_custom')->nullable();
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
