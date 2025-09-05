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
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->boolean('is_nav')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_banner')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('status')->default('active');
            $table->dropColumn('is_nav');
            $table->dropColumn('is_featured');
            $table->dropColumn('is_banner');
        });
    }
};
