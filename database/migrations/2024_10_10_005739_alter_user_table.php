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
        // Use Schema::table to modify the existing 'users' table
        Schema::table('users', function (Blueprint $table) {
            // Apply your changes here, e.g., modifying existing columns
            $table->foreignId('class_id')->nullable()->change(); // Alter the 'class_id' column to nullable
            $table->foreignId('academic_year_id')->nullable()->change(); // Alter the 'academic_year_id' column to nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse your changes here using Schema::table
        Schema::table('users', function (Blueprint $table) {
            // Rollback the changes made in the 'up' method
            $table->foreignId('class_id')->nullable(false)->change(); // Make 'class_id' non-nullable again (if that was the previous state)
            $table->foreignId('academic_year_id')->nullable(false)->change(); // Make 'academic_year_id' non-nullable again (if that was the previous state)
        });
    }
};
