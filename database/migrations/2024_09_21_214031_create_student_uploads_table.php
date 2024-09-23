<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentUploadsTable extends Migration
{
    public function up()
    {
        Schema::create('student_uploads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('instructor_id')->constrained()->onDelete('cascade');
            $table->foreignId('resource_id')->nullable()->constrained('resources')->onDelete('set null'); // Link to resource
            $table->string('assignment_title'); // Title from resource's file_name
            $table->string('file'); // Path to the uploaded file
            $table->timestamp('upload_date')->useCurrent(); // Automatically set upload date
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_uploads');
    }
}
