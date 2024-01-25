<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PizzaOption;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public $pizzaList, $ingedientsList;

    public function __construct()
    {
        $this->pizzaList = PizzaOption::all();
        $this->ingedientsList = DB::table('ingredients')->get()->skip(1);
    }

    public function admin()
    {
        $orders = DB::table('orders')->whereNotNull('placed_at')->get();

        return view('admin', ['orders' => $orders, 'sortBy' => 'id', 'sortOrder' => 'asc']);
    }

    public function adminSorted(Request $request)
    {
        $ordersQuery = Order::query();

        $sortableFields = ['id', 'placed_at', 'completed_at', 'total_price', 'total_weight', 'total_calories'];
        $sortBy = $request->query('sort_by', 'id');
        $sortOrder = $request->query('sort_order', 'asc');
    
        if (in_array($sortBy, $sortableFields)) {
            $ordersQuery->orderBy($sortBy, $sortOrder);
        }
    
        $ordersQuery->whereNotNull('placed_at');

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
        $order->recipient_name = $request->recipient_name;
        $order->recipient_address = $request->recipient_address;
        $order->recipient_phone = $request->recipient_phone;
        $order->recipient_email = $request->recipient_email;
        $order->payment_method = $request->payment_method;

        $order->save();

        return redirect()->route('admin')->with('success', 'Zamówienie zostało zaktualizowane.');
    }

    public function adminDeleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('admin')->with('success', 'Zamówienie zostało usunięte.');
    }

    public function adminCompleteOrder($id)
    {
        $order = Order::find($id);
        $order->completed_at = now();
        $order->save();

        return redirect()->route('admin')->with('success', 'Zamówienie zostało oznaczone jako zrealizowane.');
    }

    public function adminShowOrder($id)
    {
        $order = Order::find($id);
        $pizzas = DB::table('pizzas')->where('order_id', $order->id)->get();

        return view('adminShowOrder', ['order' => $order, 'pizzas' => $pizzas]);
    }

}
