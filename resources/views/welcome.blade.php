<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Manufaktura pizzy</title>

        @include('layouts.imports')
    </head>
    <body class="antialiased">
        @include('layouts.navbar')
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-pizza bg-center">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">

                <div class="mt-16">
                    <h1 class="font-semibold dark:text-gray-400" style="font-size: 3em; margin-bottom: 1em;">Manufaktura pizzy</h1>
                    <h2 class="font-semibold dark:text-gray-400" style="font-size: 2em; margin-bottom: 1em;">Wszystko, czego potrzebujesz, w jednym miejscu</h2>
                </div>
                @auth
                <div class="mt-16">
                    <div class="flex justify-center">
                        <a href="{{ route('service') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                            Rozpocznij
                        </a>
                    </div>
                </div>
                @else
                <div class="mt-16">
                    <h1 class="font-semibold dark:text-gray-400" style="font-size: 3em; margin-bottom: 1em;">Zaloguj się, aby złożyć zamówienie</h1>
                </div>
                @endauth
            </div>
        </div>
    </body>
</html>
