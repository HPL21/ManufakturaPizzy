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
        Schema::create('pizza_ingredients', function (Blueprint $table) {
            $table->unsignedBigInteger('pizza_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('pizza_id')
                ->references('id')
                ->on('pizzas');
            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients');
            $table->float('ingredient_weight', 8, 2);
            $table->primary(['pizza_id', 'ingredient_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_ingredients');
    }
};
