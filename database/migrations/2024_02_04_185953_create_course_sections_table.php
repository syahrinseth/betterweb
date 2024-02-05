<?php

use App\Models\Course;
use App\Models\CourseSection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignIdFor(Course::class);
            $table->timestamps();
        });

        DB::table('lessons')->delete();

        Schema::table('lessons', function (Blueprint $table) {
            $table->foreignIdFor(CourseSection::class)->after('id');
            $table->dropColumn('course_id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_sections');
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn('course_section_id');
        });
    }
};
