<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel administracyjny</title>
    @include('layouts.imports')
</head>
<body class="antialiased bg-simple">
    @include('layouts.navbar')

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center">
        <div class="max-w-7xl p-6 lg:p-8">
            <div class="container mt-5">
                <div class="card rounded-3 dynamic-shadow">
                    <div class="card-header">
                        <h3 class="font-weight-bold text-center">Szczegóły zamówienia</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 p-5">
                                <h5>Informacje o zamówieniu:</h5>
                                <p>ID: {{ $order->id }}</p>
                                <p>Złożono: {{ $order->placed_at }}</p>
                                <p>Zrealizowano: {{ $order->completed_at }}</p>
                                <p>Kwota zamówienia: {{ $order->total_price }} zł</p>
                                <p>Total Weight: {{ $order->total_weight }} g</p>
                                <p>Kalorie: {{ $order->total_calories }} kcal</p>
                                <p>Imię i nazwisko: {{ $order->recipient_name }}</p>
                                <p>Adres: {{ $order->recipient_address }}</p>
                                <p>Numer telefonu: {{ $order->recipient_phone }}</p>
                                <p>Email: {{ $order->recipient_email }}</p>
                                <p>Metoda płatności: {{ $order->payment_method }}</p>
                            </div>
                            <div class="col-md-6 p-5">
                                <h5>Lista zamówionych pizz</h5>
                                <ul class="list-group">
                                    @foreach($pizzas as $pizza)
                                        <li class="list-group-item">{{ $pizza->name }} - {{ $pizza->price }} zł</li>
                                    @endforeach
                                </ul>
                            </div>
                            <a href="{{ route('admin') }}" class="btn btn-danger btn-lg">Powrót</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
