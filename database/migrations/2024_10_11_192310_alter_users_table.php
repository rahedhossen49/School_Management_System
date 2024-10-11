<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Make class_id nullable
        $table->foreignId('class_id')->nullable()->change();
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Revert class_id back to not nullable (if necessary)
        $table->foreignId('class_id')->nullable(false)->change();
    });
}

};
