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
        Schema::create('bookmark_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest_user_id');
            $table->string('name');

            $table->foreign('guest_user_id')->references('id')->on('guest_users');
        });

        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest_user_id');
            $table->unsignedBigInteger('bookmark_category_id');
            $table->string('name');
            $table->text('url');

            $table->foreign('guest_user_id')->references('id')->on('guest_users');
            $table->foreign('bookmark_category_id')->references('id')->on('bookmark_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
        Schema::dropIfExists('bookmark_categories');
    }
};
