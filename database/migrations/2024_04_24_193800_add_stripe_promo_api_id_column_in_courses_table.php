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
        Schema::table('courses', function (Blueprint $table) {
            $table->dateTime('stripe_promo_end_at')->nullable()->after('stripe_price_id');
            $table->integer('stripe_promo_amount')->default(0)->after('stripe_price_id');
            $table->string('stripe_promo_api_id')->nullable()->after('stripe_price_id');
            $table->double('stripe_price_amount')->default(0.0)->after('stripe_price_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('stripe_promo_api_id');
            $table->dropColumn('stripe_promo_end_at');
            $table->dropColumn('stripe_promo_amount');
            $table->dropColumn('stripe_price_amount');
        });
    }
};
