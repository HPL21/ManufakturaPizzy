<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zamówienie</title>

        @include('layouts.imports')
    </head>
    <body class="antialiased">
        @include('layouts.navbar')
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-pizza bg-center">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">

                <div class="table-container">
                    <h1 class="font-semibold dark:text-gray-400" style="font-size: 3em; margin-bottom: 1em;">Złóż zamówienie</h1>
                    <form role="form" action="{{ route('store') }}" id="restaurant-order-form" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <table data-toggle="table" class="table table-striped table-bordered table-hover table-light">
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
                                        <a href="{{ route('restaurantStore', $pizza) }}" class="btn btn-primary">Wybierz </a>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>Proprio</td>
                                    <td>Własna kompozycja składników</td>
                                    <td>
                                        <a href="{{route('restaurantCreate')}}" class="btn btn-primary">Wybierz </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </form>
                    @if ($request != null)
                        <p>Wybrano pizzę: {{$request->name}}, cena: {{$request->price}}, kalorie: {{$request->calories}}, waga: {{$request->weight}}</p>
                    @endif
                    <a href="{{route('restaurantSummary')}}" class="btn btn-primary">Przejdź do podsumowania</a>
                </div>
            </div>
        </div>
    </body>
</html>