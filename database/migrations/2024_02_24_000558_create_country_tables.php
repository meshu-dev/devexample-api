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
        /*
        Schema::create('continents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest_user_id');
            $table->string('name');

            $table->foreign('guest_user_id')->references('id')->on('guest_users');
        }); */

        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest_user_id');
            //$table->unsignedBigInteger('continent_id');
            $table->string('name');

            $table->foreign('guest_user_id')->references('id')->on('guest_users');
            //$table->foreign('continent_id')->references('id')->on('continents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('continents');
        //Schema::dropIfExists('countries');
    }
};
