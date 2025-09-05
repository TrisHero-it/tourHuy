<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 225)->nullable();
            $table->string('status', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('category_childs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 225)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });

        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 225)->nullable();
            $table->string('description', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('status', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });

        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('status', 255)->nullable();
        });

        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->text('content')->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('status', 255)->nullable();
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('startDate')->nullable();
            $table->text('content')->nullable();
            $table->string('status', 255)->nullable();
            $table->unsignedBigInteger('tour_id');

            $table->foreign('tour_id')
                ->references('id')
                ->on('tours')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('accounts');
        Schema::dropIfExists('tours');
        Schema::dropIfExists('category_childs');
        Schema::dropIfExists('categories');
    }
};
