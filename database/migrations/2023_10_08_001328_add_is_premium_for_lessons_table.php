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
            $table->boolean('is_premium')->default(false);
            $table->json('lesson_key_points')->nullable();
            $table->string('github_source_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function(Blueprint $table) {
            $table->dropColumn('is_premium');
            $table->dropColumn('lesson_key_points');
            $table->dropColumn('github_source_code');
        });
    }
};
