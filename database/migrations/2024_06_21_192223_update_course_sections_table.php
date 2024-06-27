<?php

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
        Schema::table('course_sections', function(Blueprint $table) {
            $table->integer('order')->after('course_id');
        });

        $groupedCourseSections = DB::table('course_sections')->get()->groupBy('course_id');
        foreach ($groupedCourseSections as $course_sections) {
            $items = $course_sections->sortBy('id');
            foreach($items as $key => $item) {
                DB::table('course_sections')
                    ->where('id', $item->id)
                    ->update([
                        'order' => $key + 1
                    ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_sections', function(Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};
