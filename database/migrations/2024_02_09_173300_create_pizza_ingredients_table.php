<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_ingredients', function (Blueprint $table) {
            $table->unsignedBigInteger('pizza_id');
            $table->unsignedBigInteger('ingredient_id')->index('pizza_ingredient_ingredient_id_foreign');
            $table->double('ingredient_amount', 8, 2);

            $table->primary(['pizza_id', 'ingredient_id']);
            $table->index(['pizza_id', 'ingredient_id'], 'pizza_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_ingredients');
    }
};
