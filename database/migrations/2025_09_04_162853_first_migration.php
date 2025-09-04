<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 225)->nullable();
            $table->string('status', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->timestamp('created')->useCurrent();
            $table->text('titele')->nullable();
            $table->string('creator', 255);
            $table->timestamp('updated');
            $table->string('updater', 255);
        });

        Schema::create('category_child', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 225)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->timestamp('created')->useCurrent();
            $table->string('creator', 255);
            $table->timestamp('updated');
            $table->string('updater', 255);
            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('cascade');
        });

        Schema::create('tour', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 225)->nullable();
            $table->string('description', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('status', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->timestamp('created')->useCurrent();
            $table->string('creator', 255);
            $table->timestamp('updated');
            $table->string('updater', 255);
            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('cascade');
        });

        Schema::create('account', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('status', 255)->nullable();
            $table->timestamp('created')->useCurrent();
            $table->string('creator', 255);
            $table->timestamp('updated');
            $table->string('updater', 255);
        });

        Schema::create('blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->text('content')->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->timestamp('created')->useCurrent();
            $table->string('creator', 255);
            $table->timestamp('updated');
            $table->string('updater', 255);
        });

        Schema::create('schedule', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('startDate')->nullable();
            $table->text('content')->nullable();
            $table->string('status', 255)->nullable();
            $table->timestamp('created')->useCurrent();
            $table->string('creator', 255);
            $table->timestamp('updated');
            $table->string('updater', 255);
            $table->unsignedBigInteger('tour_id');

            $table->foreign('tour_id')
                ->references('id')
                ->on('tour')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedule');
        Schema::dropIfExists('blog');
        Schema::dropIfExists('account');
        Schema::dropIfExists('tour');
        Schema::dropIfExists('category_child');
        Schema::dropIfExists('category');
    }
};
