<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PizzaOption;
use App\Models\Pizza;
use App\Models\PizzaIngredient;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ValidateCustomerDataRequest;

class RestaurantController extends Controller
{
    public $pizzaList, $ingedientsList;

    public function __construct()
    {
        $this->pizzaList = PizzaOption::all();
        $this->ingedientsList = DB::table('ingredients')->get()->skip(1);
    }

    public function index()
    {
        return view('restaurant', ['pizzaList' => $this->pizzaList, 'request' => null]);
    }

    public function create(Request $request)
    {

        return view('restaurantCreate', ['ingredientsList' => $this->ingedientsList]);
    }

    public function pizzaCreate(Request $request)
    {
        $user = auth()->user();

        // Check if there are no active orders or all orders are completed
        $hasActiveOrders = DB::table('orders')->where('user_id', $user->id)->whereNull('placed_at')->whereNull('completed_at')->exists();

        if (!$hasActiveOrders) {
            // Create a new order
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => 0, // You can set initial values as needed
                'total_weight' => 0,
                'total_calories' => 0,
            ]);
        }
        else {
            // Get the last order
            $order =DB::table('orders')->where('user_id', $user->id)->whereNull('placed_at')->whereNull('completed_at')->first();
            $order = Order::find($order->id);
        }

        $pizza = Pizza::create([
            'order_id' => $order->id,
            'name' => "Proprio",
            'weight' => 0,
            'calories' => 0,
            'price' => 0
        ]);

        $pizza->weight += $request->doughWeight;
        $pizza->calories += $request->doughWeight / 200 * 325;
        $pizza->price += $request->doughWeight / 200 * 15;

        $ingredientsCount = $request->ingredients;

        for ($i = 1; $i <= $ingredientsCount; $i++) {
            $ingredient = $request->input('ingredient' . $i);
            $ingredientAmount = $request->input('ingredient' . $i . 'amount');
            Log::info($ingredient);
            $ingredient = DB::table('ingredients')->where('id', $ingredient)->first();
            $pizza->weight += $ingredient->weight * $ingredientAmount;
            $pizza->calories += $ingredient->calories * $ingredientAmount;
            $pizza->price += $ingredient->price * $ingredientAmount;

            $pizzaIngredient = PizzaIngredient::create([
                'pizza_id' => $pizza->id,
                'ingredient_id' => $ingredient->id,
                'ingredient_amount' => $ingredientAmount
            ]);

            $pizzaIngredient->save();
        }

        $pizza->save();

        return view('restaurant', ['pizzaList' => $this->pizzaList, 'request' => $pizza]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Check if there are no active orders or all orders are completed
        $hasActiveOrders = DB::table('orders')->where('user_id', $user->id)->whereNull('placed_at')->whereNull('completed_at')->exists();

        if (!$hasActiveOrders) {
            // Create a new order
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => 0, // You can set initial values as needed
                'total_weight' => 0,
                'total_calories' => 0,
            ]);
        }
        else {
            // Get the last order
            $order = DB::table('orders')->where('user_id', $user->id)->whereNull('placed_at')->whereNull('completed_at')->first();
            $order = Order::find($order->id);
        }

        $pizza = Pizza::create([
            'order_id' => $order->id,
            'name' => "",
            'weight' => 0,
            'calories' => 0,
            'price' => 0
        ]);

        $pizzaOption = DB::table('pizza_options')->where('id', $request->id)->first();

        $pizza->name = $pizzaOption->name;

        $ingredients = $pizzaOption->ingredients;

        $ingredients = explode(",", $ingredients);

        foreach ($ingredients as $ingredient) {
            $ingredient = trim($ingredient);
            $ingredient = DB::table('ingredients')->where('name', $ingredient)->first();
            $pizza->weight += $ingredient->weight;
            $pizza->calories += $ingredient->calories;
            $pizza->price += $ingredient->price;
        }

        $pizza->save();

        return view('restaurant', ['pizzaList' => $this->pizzaList, 'request' => $pizza]);

    }

    public function summary(Request $request)
    {
        $user = auth()->user();

        // Check if there are no active orders or all orders are completed
        $hasActiveOrders = DB::table('orders')->where('user_id', $user->id)->whereNull('placed_at')->whereNull('completed_at')->exists();

        if (!$hasActiveOrders) {
            // Create a new order
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => 0, // You can set initial values as needed
                'total_weight' => 0,
                'total_calories' => 0,
            ]);
        }
        else {
            // Get the last order
            $order = DB::table('orders')->where('user_id', $user->id)->whereNull('placed_at')->whereNull('completed_at')->first();
            $order = Order::find($order->id);
        }

        // Get all pizzas from the order

        $pizzas = DB::table('pizzas')->where('order_id', $order->id)->get();

        $order->total_price = 0;
        $order->total_weight = 0;
        $order->total_calories = 0;

        foreach ($pizzas as $pizza) {
            $order->total_price += $pizza->price;
            $order->total_weight += $pizza->weight;
            $order->total_calories += $pizza->calories;
        }

        $order->save();

        return view('restaurantSummary', ['pizzas' => $pizzas, 'order' => $order]);
    }

    public function placeOrder(ValidateCustomerDataRequest $request)
    {

        $user = auth()->user();

        // Check if there are no active orders or all orders are completed
        $hasActiveOrders = DB::table('orders')->where('user_id', $user->id)->whereNull('placed_at')->whereNull('completed_at')->exists();

        if (!$hasActiveOrders) {
            return back()->withErrors(['message' => 'Nie można złożyć zamówienia, ponieważ nie ma aktywnych zamówień.']);
        }
        else {
            // Get the last order
            $order = DB::table('orders')->where('user_id', $user->id)->whereNull('placed_at')->whereNull('completed_at')->first();
            $order = Order::find($order->id);
        }

        $order->placed_at = now();
        $order->recipient_name = $request->name;
        $order->recipient_address = $request->address;
        $order->recipient_phone = $request->phone;
        $order->recipient_email = $request->email;
        $order->payment_method = $request->payment;

        $order->save();

        return redirect()->route('home');
    }

    public function removePizza($id)
    {
        $pizza = Pizza::find($id);
        $pizza->delete();

        return redirect()->route('restaurantSummary');
    }

    public function admin()
    {
        $orders = DB::table('orders')->whereNotNull('placed_at')->get();

        return view('admin', ['orders' => $orders, 'sortBy' => 'id', 'sortOrder' => 'asc']);
    }

    public function adminSorted(Request $request)
    {
        $ordersQuery = Order::query();

        // Sorting logic
        $sortableFields = ['id', 'placed_at', 'completed_at', 'total_price', 'total_weight', 'total_calories'];
        $sortBy = $request->query('sort_by', 'id');
        $sortOrder = $request->query('sort_order', 'asc');
    
        if (in_array($sortBy, $sortableFields)) {
            $ordersQuery->orderBy($sortBy, $sortOrder);
        }
    
        $orders = $ordersQuery->get();

        return view('admin', compact('orders', 'sortBy', 'sortOrder'));
    }

    public function adminEditOrder($id)
    {
        $order = Order::find($id);

        return view('adminEditOrder', ['order' => $order]);
    }

    public function adminUpdateOrder(Request $request, $id)
    {
        $order = Order::find($id);

        $order->placed_at = $request->placed_at;
        $order->completed_at = $request->completed_at;
        $order->total_price = $request->total_price;
        $order->total_weight = $request->total_weight;
        $order->total_calories = $request->total_calories;
        $order->recipient_name = $request->name;
        $order->recipient_address = $request->address;
        $order->recipient_phone = $request->phone;
        $order->recipient_email = $request->email;
        $order->payment_method = $request->payment;

        $order->save();

        return redirect()->route('admin');
    }

    public function adminDeleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('admin');
    }

    public function adminCompleteOrder($id)
    {
        $order = Order::find($id);
        $order->completed_at = now();
        $order->save();

        return redirect()->route('admin');
    }

    public function adminShowOrder($id)
    {
        $order = Order::find($id);
        $pizzas = DB::table('pizzas')->where('order_id', $order->id)->get();

        return view('adminShowOrder', ['order' => $order, 'pizzas' => $pizzas]);
    }

}
