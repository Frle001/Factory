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
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->timestamps();

            $table->index('category_id');
            $table->index('tag_id');
            $table->index('ingredient_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
