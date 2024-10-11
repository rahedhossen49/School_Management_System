<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'class_id')) {
                $table->foreignId('class_id')->nullable()->constrained('classes')->onDelete('cascade')->onUpdate('cascade');
            }

            if (!Schema::hasColumn('users', 'academic_year_id')) {
                $table->foreignId('academic_year_id')->nullable()->constrained('academic_years')->onDelete('cascade')->onUpdate('cascade');
            }

            if (!Schema::hasColumn('users', 'admission_date')) {
                $table->string('admission_date')->nullable();
            }

            if (!Schema::hasColumn('users', 'father_name')) {
                $table->string('father_name')->nullable();
            }

            if (!Schema::hasColumn('users', 'mother_name')) {
                $table->string('mother_name')->nullable();
            }

            if (!Schema::hasColumn('users', 'mobile_no')) {
                $table->string('mobile_no')->nullable();
            }

            if (!Schema::hasColumn('users', 'dob')) {
                $table->string('dob')->nullable();
            }
        });
    }


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'class_id')) {
                $table->dropForeign(['class_id']);
                $table->dropColumn('class_id');
            }

            if (Schema::hasColumn('users', 'academic_year_id')) {
                $table->dropForeign(['academic_year_id']);
                $table->dropColumn('academic_year_id');
            }

            if (Schema::hasColumn('users', 'admission_date')) {
                $table->dropColumn('admission_date');
            }

            if (Schema::hasColumn('users', 'father_name')) {
                $table->dropColumn('father_name');
            }

            if (Schema::hasColumn('users', 'mother_name')) {
                $table->dropColumn('mother_name');
            }

            if (Schema::hasColumn('users', 'mobile_no')) {
                $table->dropColumn('mobile_no');
            }

            if (Schema::hasColumn('users', 'dob')) {
                $table->dropColumn('dob');
            }
        });
    }
};



// <?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::table('users', function (Blueprint $table) {
//             $table->foreignId('class_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
//             $table->foreignId('academic_year_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
//             $table->string('admission_date')->nullable();
//             $table->string('father_name')->nullable();
//             $table->string('mother_name')->nullable();
//             $table->string('mobile_no')->nullable();
//             $table->string('dob')->nullable();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropColumns('class_id');
//         Schema::dropColumns('academic_year_id');
//         Schema::dropColumns('admission_date');
//         Schema::dropColumns('father_name');
//         Schema::dropColumns('mother_name');
//         Schema::dropColumns('mobile_no');
//         Schema::dropColumns('dob');

//     }
// };
