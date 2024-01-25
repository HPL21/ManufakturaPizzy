<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Podsumowanie zamówienia</title>
    @include('layouts.imports')
</head>
<body class="antialiased bg-simple">
    @include('layouts.navbar')
    <div class="container mt-4 mb-4">
        <div class="row justify-content-center">
            <div class="col-lg-6 dynamic-shadow p-5 rounded-3 bg-custom-dark">
                <h1 class="font-weight-bold text-light" style="font-size: 3em; margin-bottom: 1em;">Podsumowanie</h1>
                <form role="form" action="{{ route('restaurantPlaceOrder') }}" id="restaurant-order-form" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @foreach ($pizzas as $pizza)
                        <div class="mb-4 order-item d-flex align-items-center">
                            <div class="col-lg-8">
                                <p class="text-light"><strong>Nazwa pizzy:</strong> {{ $pizza->name }}</p>
                                <p class="text-light"><strong>Cena:</strong> {{ $pizza->price }}</p>
                                <p class="text-light"><strong>Waga:</strong> {{ $pizza->weight }}</p>
                                <p class="text-light"><strong>Kalorie:</strong> {{ $pizza->calories }}</p>
                            </div>
                            <div class="col-lg-4"><a href="{{ route('restaurantRemovePizza', ['id' => $pizza->id]) }}" class="text-light"><img src="/images/delete2.png" alt="Usuń" class="icon"></a></div>
                        </div>
                    @endforeach

                    <div class="mb-4 border-bottom">
                        <p class="text-light fs-2"><strong>Zamówienie:</strong></p>
                        <p class="text-light fs-4"><strong>Kwota zamówienia:</strong> {{ $order->total_price }} zł</p>
                        <p class="text-light fs-4"><strong>Waga:</strong> {{ $order->total_weight }} g</p>
                        <p class="text-light fs-4"><strong>Kalorie:</strong> {{ $order->total_calories }} kcal</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-light fs-5"><strong>Dane dostawy:</strong></p>
                        <input type="text" class="form-control my-4 p-4" name="name" placeholder="Imię i nazwisko" required>
                        <input type="text" class="form-control my-4 p-4" name="address" placeholder="Adres" required>
                        <input type="text" class="form-control my-4 p-4" name="phone" placeholder="Numer telefonu" required>
                        <input type="text" class="form-control my-4 p-4" name="email" placeholder="Adres e-mail" required>
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input type="radio" id="cash" name="payment" value="cash" checked class="form-check-input">
                            <label for="cash" class="form-check-label text-light">Płatność gotówką</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="card" name="payment" value="card" class="form-check-input">
                            <label for="card" class="form-check-label text-light">Płatność kartą</label>
                        </div>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">
                        <a href="{{ route('welcome') }}" class="btn btn-secondary">Wróć do restauracji</a>
                        <input type="submit" class="btn btn-primary btn-custom" value="Złóż zamówienie">
                    </div>
                </form> 
            </div>
        </div>
    </div>
</body>

</html>
