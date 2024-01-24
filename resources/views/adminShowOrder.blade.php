<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Panel administracyjny</title>

        @include('layouts.imports')
    </head>
    <body class="antialiased">
    @include('layouts.navbar')

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-pizza bg-center">
        <div class="max-w-7xl p-6 lg:p-8">
            <h1 class="font-semibold dark:text-gray-400 text-3xl mb-4">Szczegóły zamówienia </h1>

            <div class="container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="font-weight-bold text-center">Order Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Information</h5>
                                <p>ID: {{ $order->id }}</p>
                                <p>Placed At: {{ $order->placed_at }}</p>
                                <p>Completed At: {{ $order->completed_at }}</p>
                                <p>Total Price: {{ $order->total_price }}</p>
                                <p>Total Weight: {{ $order->total_weight }}</p>
                                <p>Total Calories: {{ $order->total_calories }}</p>
                                <p>Recipient Name: {{ $order->recipient_name }}</p>
                                <p>Recipient Address: {{ $order->recipient_address }}</p>
                                <p>Recipient Phone: {{ $order->recipient_phone }}</p>
                                <p>Recipient Email: {{ $order->recipient_email }}</p>
                                <p>Payment Method: {{ $order->payment_method }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Pizza List</h5>
                                <ul class="list-group">
                                    @foreach($pizzas as $pizza)
                                        <li class="list-group-item">{{ $pizza->name }} - {{ $pizza->price }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
