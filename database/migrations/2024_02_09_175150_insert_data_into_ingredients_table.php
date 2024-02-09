<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertDataIntoIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('ingredients')->insert([
            ['name' => 'Ciasto', 'price' => 15, 'weight' => 200, 'calories' => 325],
            ['name' => 'Sos pomidorowy', 'price' => 5, 'weight' => 80, 'calories' => 30],
            ['name' => 'Mozzarella', 'price' => 10, 'weight' => 80, 'calories' => 280],
            ['name' => 'Oliwa', 'price' => 3, 'weight' => 10, 'calories' => 880],
            ['name' => 'Prosciutto crudo', 'price' => 7, 'weight' => 40, 'calories' => 225],
            ['name' => 'Gorgonzola', 'price' => 7, 'weight' => 40, 'calories' => 350],
            ['name' => 'Parmezan', 'price' => 3, 'weight' => 15, 'calories' => 430],
            ['name' => 'Spianata piccante', 'price' => 7, 'weight' => 40, 'calories' => 370],
            ['name' => 'Salami milano', 'price' => 7, 'weight' => 40, 'calories' => 370],
            ['name' => 'Czosnek + oregano (marinara)', 'price' => 5, 'weight' => 15, 'calories' => 50],
            ['name' => 'Gruszka', 'price' => 5, 'weight' => 30, 'calories' => 55],
            ['name' => 'Orzechy włoskie', 'price' => 5, 'weight' => 10, 'calories' => 650],
            ['name' => 'Czerwona cebula', 'price' => 5, 'weight' => 30, 'calories' => 40],
            ['name' => 'Czerwona papryka', 'price' => 5, 'weight' => 50, 'calories' => 40],
            ['name' => 'Tuńczyk', 'price' => 6, 'weight' => 40, 'calories' => 60],
            ['name' => 'Pieczarki', 'price' => 5, 'weight' => 40, 'calories' => 30],
            ['name' => 'Oliwki', 'price' => 5, 'weight' => 20, 'calories' => 115],
            ['name' => 'Biały sos', 'price' => 8, 'weight' => 70, 'calories' => 200],
            ['name' => 'Pomidorki koktajlowe', 'price' => 5, 'weight' => 50, 'calories' => 20],
            ['name' => 'Rukola', 'price' => 5, 'weight' => 20, 'calories' => 25],
            ['name' => 'Nduja', 'price' => 8, 'weight' => 30, 'calories' => 600],
            ['name' => 'Miód', 'price' => 4, 'weight' => 20, 'calories' => 300],
            ['name' => 'Mascarpone', 'price' => 6, 'weight' => 50, 'calories' => 400]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // You can add a rollback operation if needed
    }
}
