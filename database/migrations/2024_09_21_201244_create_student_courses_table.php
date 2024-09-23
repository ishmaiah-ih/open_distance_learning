<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('student_id'); // Foreign Key to users (students)
            $table->unsignedBigInteger('course_id'); // Foreign Key to courses
            $table->timestamp('assigned_at'); // Assignment timestamp
            $table->timestamps(); // Created_at and updated_at fields

            // Foreign key constraints
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_courses');
    }
}
