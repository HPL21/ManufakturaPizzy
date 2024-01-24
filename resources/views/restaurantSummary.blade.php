<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Podsumowanie zamówienia</title>

        @include('layouts.imports')
    </head>
    <body class="antialiased">
        @include('layouts.navbar')
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-pizza bg-center">
            <div class="max-w-7xl mx-auto p-6 lg:p-8" style="background-color: #e5e7eb;">
                <form role="form" action="{{ route('restaurantPlaceOrder') }}" id="restaurant-order-form" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @foreach ($pizzas as $pizza)
                        Nazwa pizzy: {{ $pizza->name }}<br>
                        Cena: {{ $pizza->price }}<br>
                        Waga: {{ $pizza->weight }}<br>
                        Kalorie: {{ $pizza->calories }}<br>
                        <a href="{{ route('restaurantRemovePizza', ['id' => $pizza->id]) }}">Usuń pizzę</a><br>
                    @endforeach

                    Zamówienie:<br>
                    Kwota zamówienia: {{ $order->total_price }}<br>
                    Waga: {{ $order->total_weight }}<br>
                    Kalorie: {{ $order->total_calories }}<br>
                    Dane dostawy:
                    <input type="text" name="name" placeholder="Imię i nazwisko" required><br>
                    <input type="text" name="address" placeholder="Adres" required><br>
                    <input type="text" name="phone" placeholder="Numer telefonu" required><br>
                    <input type="text" name="email" placeholder="Adres e-mail" required><br>
                    <input type="radio" id="cash" name="payment" value="cash" checked>
                    <label for="cash">Płatność gotówką</label><br>
                    <input type="radio" id="card" name="payment" value="card">
                    <label for="card">Płatność kartą</label><br>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <a href="{{ route('restaurant') }}">Wróć do restauracji</a>
                    <input type="submit" value="Złóż zamówienie">            
                </form> 
            </div>
        </div>
    </body>
</html>