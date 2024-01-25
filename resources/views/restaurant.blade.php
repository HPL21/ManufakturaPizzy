<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zamówienie</title>
    @include('layouts.imports')
</head>
<body class="antialiased bg-simple">
    @include('layouts.navbar')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 bg-custom-dark p-5 dynamic-shadow rounded-3">
                <div class="table-container">
                    <h1 class="font-weight-bold text-light" style="font-size: 3em; margin-bottom: 1em;">Złóż zamówienie</h1>
                        <table class="table table-striped table-hover table-light">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nazwa</th>
                                    <th>Składniki</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pizzaList as $pizza)
                                <tr>
                                    <td>{{ $pizza->name }}</td>
                                    <td>{{ $pizza->ingredients }}</td>
                                    <td>
                                        <a href="{{ route('restaurantStore', $pizza) }}" class="btn btn-primary btn-custom">Wybierz</a>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>Proprio</td>
                                    <td>Własna kompozycja składników</td>
                                    <td>
                                        <a href="{{ route('restaurantCreate') }}" class="btn btn-primary btn-custom">Wybierz</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @if ($request != null)
                        <p class="text-success font-weight-bold fs-4">Wybrano pizzę: {{$request->name}}, cena: {{$request->price}} zł, kalorie: {{$request->calories}} kcal, waga: {{$request->weight}} g</p>
                    @endif
                    <a href="{{ route('restaurantSummary') }}" class="btn btn-primary btn-custom">Przejdź do podsumowania</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
