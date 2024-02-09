<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('pizza_options')->insert([
            ['name' => 'Margherita', 'ingredients' => 'Ciasto, Sos pomidorowy, Mozzarella, Oliwa'],
            ['name' => 'Marinara', 'ingredients' => 'Ciasto, Sos pomidorowy, Czosnek + oregano (marinara), Oliwa'],
            ['name' => 'Mare', 'ingredients' => 'Ciasto, Sos pomidorowy, Mozzarella, Tuńczyk, Czerwona cebula'],
            ['name' => 'Dolce', 'ingredients' => 'Ciasto, Biały sos, Mozzarella, Gorgonzola, Gruszka, Orzechy włoskie, Miód'],
            ['name' => 'Santiago', 'ingredients' => 'Ciasto, Sos pomidorowy, Mozzarella, Spianata piccante, Czerwona cebula, Czerwona papryka'],
            ['name' => 'Ruccoli', 'ingredients' => 'Ciasto, Sos pomidorowy, Mozzarella, Prosciutto crudo, Pomidorki koktajlowe, Rukola'],
            ['name' => 'Speziato', 'ingredients' => 'Ciasto, Sos pomidorowy, Mozzarella, Nduja, Czerwona cebula, Mascarpone'],
            ['name' => 'Ordinario', 'ingredients' => 'Ciasto, Sos pomidorowy, Salami milano, Oliwki, Pieczarki, Oliwa'],
        ]);
    }
};
