<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PizzaOption;
use App\Models\Pizza;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public $pizzaList = PizzaOption::orderBy('id', 'asc')->get();

    public function index()
    {
        return view('restaurant', ['pizzaList' => $this->pizzaList]);
    }

    public function create()
    {
        return view('restaurantCreate');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Check if there are no active orders or all orders are completed
        $hasActiveOrders = DB::table('orders')->where('user_id', $user->id)->whereNull('completed_at')->exists();

        if (!$hasActiveOrders) {
            // Create a new order
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => 0, // You can set initial values as needed
                'total_weight' => 0,
                'total_calories' => 0,
                'placed_at' => now(),
            ]);
        }
        else {
            // Get the last order
            $order = DB::table('orders')->where('user_id', $user->id)->where('total_price', 0)->whereNull('completed_at')->latest('placed_at')->first();
            $order = Order::find($order->id);
        }

        $pizza = Pizza::create([
            'order_id' => $order->id
        ]);


        echo "<script type='text/javascript'>alert('$request');</script>";

        // $pizzaOption = DB::table('pizza_options')->where('id', $request->pizzaOption)->first();

        // $ingredients = $pizzaOption->ingredients;

        // return view('restaurant', ['pizzaList' => $ingredients]);
        return view('restaurant', ['pizzaList' => $this->pizzaList]);

    }

}
