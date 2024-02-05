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
        Schema::create('site_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('site_category_id');
            $table->string('name');
            $table->text('url');
            $table->text('image_url');

            $table->foreign('site_category_id')->references('id')->on('site_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
        Schema::dropIfExists('site_categories');
    }
};
