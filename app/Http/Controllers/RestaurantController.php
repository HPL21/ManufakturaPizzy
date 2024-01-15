<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PizzaOption;

class RestaurantController extends Controller
{
    public function index()
    {
        $pizzaList = PizzaOption::orderBy('id', 'asc')->get();
        return view('restaurant', ['pizzaList' => $pizzaList]);
    }

    public function create()
    {
        return view('restaurantCreate');
    }

    public function store(Request $request)
    {
        $pizza = new PizzaOption();
        $pizza->name = $request->name;
        $pizza->description = $request->description;

        // How to save this?
    }
}
