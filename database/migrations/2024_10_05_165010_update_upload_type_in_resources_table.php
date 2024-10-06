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
        Schema::table('resources', function (Blueprint $table) {
            // Modify the enum to include 'audio' and 'video'
            $table->enum('upload_type', ['book', 'assignment', 'lecture', 'audio', 'video'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resources', function (Blueprint $table) {
            // Revert the enum to the original set of values
            $table->enum('upload_type', ['book', 'assignment', 'lecture'])->change();
        });
    }
};
