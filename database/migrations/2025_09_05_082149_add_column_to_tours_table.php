<?php

use App\Models\CategoryChild;
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
            $table->foreignId('category_child_id')
                ->nullable()
                ->constrained('category_childs')
                ->nullOnDelete()
                ->after('category_id');

            $table->string('schedule')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropForeign(['category_child_id']);
            $table->dropColumn('category_child_id');
            $table->dropColumn('schedule');
        });
    }
};
