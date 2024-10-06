<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instructor_id');
            $table->unsignedBigInteger('course_id');
            $table->enum('upload_type', ['book', 'assignment', 'lecture', 'audio', 'video']); // Refers to type of resource
            $table->string('file_name');   // Name of the uploaded file
            $table->string('file_path');   // Path where the file is stored
            $table->timestamp('upload_date')->useCurrent();
            $table->timestamps();

            // Foreign keys
            $table->foreign('instructor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
