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
            <h1 class="font-semibold dark:text-gray-400 text-3xl mb-4">Edycja zamówienia </h1>

            <form method="post" action="{{ route('adminUpdateOrder', ['id' => $order->id]) }}">
                @csrf
                @method('PUT')

                <label for="placed_at">Placed At:</label>
                <input type="datetime-local" name="placed_at" value="{{ $order->placed_at }}"><br>

                <label for="completed_at">Completed At:</label>
                <input type="datetime-local" name="completed_at" value="{{ $order->completed_at }}"><br>

                <label for="total_price">Total Price:</label>
                <input type="number" name="total_price" value="{{ $order->total_price }}"><br>

                <label for="total_weight">Total Weight:</label>
                <input type="number" name="total_weight" value="{{ $order->total_weight }}"><br>

                <label for="total_calories">Total Calories:</label>
                <input type="number" name="total_calories" value="{{ $order->total_calories }}"><br>

                <label for="recipient_name">Recipient Name:</label>
                <input type="text" name="recipient_name" value="{{ $order->recipient_name }}"><br>

                <label for="recipient_address">Recipient Address:</label>
                <input type="text" name="recipient_address" value="{{ $order->recipient_address }}"><br>

                <label for="recipient_phone">Recipient Phone:</label>
                <input type="tel" name="recipient_phone" value="{{ $order->recipient_phone }}"><br>

                <label for="recipient_email">Recipient Email:</label>
                <input type="email" name="recipient_email" value="{{ $order->recipient_email }}"><br>

                <input type="hidden" name="payment_method" value="{{ $order->payment_method }}">

                <button type="submit">Update Order</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
