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
        Schema::table('lessons', function (Blueprint $table) {

            $table->integer('order')->after('id');
            $table->text('description')->after('id');
            $table->string('title')->after('id');
            $table->unsignedBigInteger('course_id')->after('id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->dateTime('published')->nullable();
            $table->string('type')->default('video');
            $table->string('video_url');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {

            $table->dropColumn('order');
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');
            $table->dropColumn('published');
            $table->dropColumn('type');
            $table->dropColumn('meta_data');
            
        });
    }
};
