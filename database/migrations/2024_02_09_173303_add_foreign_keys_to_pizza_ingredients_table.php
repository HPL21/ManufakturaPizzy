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
        Schema::table('pizza_ingredients', function (Blueprint $table) {
            $table->foreign(['pizza_id'], 'pizza_ingredient_pizza_id_foreign')->references(['id'])->on('pizzas')->onDelete('CASCADE');
            $table->foreign(['ingredient_id'], 'pizza_ingredient_ingredient_id_foreign')->references(['id'])->on('ingredients')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pizza_ingredients', function (Blueprint $table) {
            $table->dropForeign('pizza_ingredient_pizza_id_foreign');
            $table->dropForeign('pizza_ingredient_ingredient_id_foreign');
        });
    }
};
