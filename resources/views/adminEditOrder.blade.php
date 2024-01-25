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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 bg-light dynamic-shadow p-5 rounded-3">
                <h1 class="font-semibold dark:text-gray-400 text-3xl mb-4">Edycja zamówienia</h1>

                <form method="post" action="{{ route('adminUpdateOrder', ['id' => $order->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="placed_at" class="form-label">Złożono:</label>
                        <input type="datetime-local" class="form-control" name="placed_at" value="{{ $order->placed_at }}">
                    </div>

                    <div class="mb-3">
                        <label for="completed_at" class="form-label">Zrealizowano:</label>
                        <input type="datetime-local" class="form-control" name="completed_at" value="{{ $order->completed_at }}">
                    </div>

                    <div class="mb-3">
                        <label for="total_price" class="form-label">Kwota zamówienia:</label>
                        <input type="number" class="form-control" name="total_price" value="{{ $order->total_price }}">
                    </div>

                    <div class="mb-3">
                        <label for="total_weight" class="form-label">Waga:</label>
                        <input type="number" class="form-control" name="total_weight" value="{{ $order->total_weight }}">
                    </div>

                    <div class="mb-3">
                        <label for="total_calories" class="form-label">Liczba kalorii:</label>
                        <input type="number" class="form-control" name="total_calories" value="{{ $order->total_calories }}">
                    </div>

                    <div class="mb-3">
                        <label for="recipient_name" class="form-label">Imię i nazwisko:</label>
                        <input type="text" class="form-control" name="recipient_name" value="{{ $order->recipient_name }}">
                    </div>

                    <div class="mb-3">
                        <label for="recipient_address" class="form-label">Adres:</label>
                        <input type="text" class="form-control" name="recipient_address" value="{{ $order->recipient_address }}">
                    </div>

                    <div class="mb-3">
                        <label for="recipient_phone" class="form-label">Numer telefonu:</label>
                        <input type="tel" class="form-control" name="recipient_phone" value="{{ $order->recipient_phone }}">
                    </div>

                    <div class="mb-3">
                        <label for="recipient_email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="recipient_email" value="{{ $order->recipient_email }}">
                    </div>

                    <input type="hidden" name="payment_method" value="{{ $order->payment_method }}">

                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Metoda płatności:</label>
                        <select class="form-select" name="payment_method">
                            <option value="cash" {{ $order->payment_method == 'CASH' ? 'selected' : '' }}>Gotówka</option>
                            <option value="card" {{ $order->payment_method == 'CARD' ? 'selected' : '' }}>Karta</option>
                        </select>
                    </div>

                    <a href="{{ route('admin') }}" class="btn btn-secondary">Wróć</a>
                    <button type="submit" class="btn btn-primary">Aktualizuj zamówienie </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
