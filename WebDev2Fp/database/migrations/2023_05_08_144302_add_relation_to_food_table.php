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
        Schema::table('stores', function (Blueprint $table) {
            $table->unsignedBigInteger('cuisine_id');
            $table->foreign('cuisine_id')->references('id')->on('cuisines')->onDelete('cascade');
            $table->unsignedBigInteger('diet_id');
            $table->foreign('diet_id')->references('id')->on('diets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('store', function (Blueprint $table) {
            //
        });
    }
};
