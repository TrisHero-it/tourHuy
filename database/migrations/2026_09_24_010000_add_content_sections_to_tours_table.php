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
        Schema::table('tours', function (Blueprint $table) {
            $table->longText('itinerary')->nullable()->after('description');
            $table->longText('price_table')->nullable()->after('itinerary');
            $table->longText('faq')->nullable()->after('price_table');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn(['itinerary', 'price_table', 'faq']);
        });
    }
};
