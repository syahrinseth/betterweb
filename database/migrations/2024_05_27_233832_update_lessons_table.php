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
        Schema::table('lessons', function(Blueprint $table) {
            $table->integer('exp')->default(0);
            $table->dropColumn('lesson_key_points');
            $table->dropColumn('github_source_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function(Blueprint $table) {
            $table->dropColumn('exp');
            $table->json('lesson_key_points');
            $table->string('github_source_code')->nullable();
        });
    }
};
