<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manufaktura pizzy</title>
    @include('layouts.imports')
</head>
<body class="antialiased bg-pizza">
    @include('layouts.navbar')
    <div class="container-sm mt-5">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center align-items-center vh-75">
            <div class="col-lg-8 bg-dark p-5 rounded-3 dynamic-shadow bottom-slide d-flex flex-column justify-content-center align-items-center">
            
                <img src="{{ asset('images/logo_white.png') }}" alt="logo" width="150" height="150">
                <div class="text-center mt-5"> 
                    <h1 class="font-weight-bold text-light" style="font-size: 3em; margin-bottom: 1em;">Manufaktura pizzy</h1>
                    <h2 class="font-weight-bold text-light" style="font-size: 2em; margin-bottom: 1em;">Wszystko, czego potrzebujesz, w jednym miejscu</h2>
                </div>
                @auth
                <div class="mt-5 text-center">
                    <a href="{{ route('restaurant') }}" class="btn btn-danger btn-lg">
                        Rozpocznij
                    </a>
                </div>
                @else
                <div class="mt-5 text-center">
                    <h1 class="font-weight-bold text-light  " style="font-size: 3em; margin-bottom: 1em;">Zaloguj się, aby złożyć zamówienie</h1>
                </div>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>
