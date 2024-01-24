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
            <h1 class="font-semibold dark:text-gray-400 text-3xl mb-4">Manufaktura pizzy - zamówienia</h1>

            <div class="">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                            <tr>
                                <th class="py-2 px-4 border-b"><a href="{{ route('adminSorted', ['sort_by' => 'id', 'sort_order' => $sortBy == 'id' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">ID</a></th>
                                <th class="py-2 px-4 border-b"><a href="{{ route('adminSorted', ['sort_by' => 'placed_at', 'sort_order' => $sortBy == 'placed_at' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Data złożenia</a></th>
                                <th class="py-2 px-4 border-b"><a href="{{ route('adminSorted', ['sort_by' => 'completed_at', 'sort_order' => $sortBy == 'completed_at' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Data realizacji</a></th>
                                <th class="py-2 px-4 border-b"><a href="{{ route('adminSorted', ['sort_by' => 'total_price', 'sort_order' => $sortBy == 'total_price' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Cena</a></th>
                                <th class="py-2 px-4 border-b"><a href="{{ route('adminSorted', ['sort_by' => 'total_weight', 'sort_order' => $sortBy == 'total_weight' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Waga</a></th>
                                <th class="py-2 px-4 border-b"><a href="{{ route('adminSorted', ['sort_by' => 'total_calories', 'sort_order' => $sortBy == 'total_calories' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Kalorie</a></th>
                                <th class="py-2 px-4 border-b">Adres odbiorcy</th>
                                <th class="py-2 px-4 border-b">Nr telefonu</th>
                                <th class="py-2 px-4 border-b">Email</th>
                                <th class="py-2 px-4 border-b">Metoda płatności</th>
                                <th class="py-2 px-4 border-b"></th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $order->id }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->placed_at }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->completed_at }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->total_price }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->total_weight }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->total_calories }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->recipient_address }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->recipient_phone }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->recipient_email }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->payment_method }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('adminEditOrder', ['id' => $order->id]) }}"
                                        class="text-blue-500 hover:underline mr-2">Edytuj</a>
                                    <a href="{{ route('adminDeleteOrder', ['id' => $order->id]) }}"
                                        class="text-red-500 hover:underline mr-2">Usuń</a>
                                    <a href="{{ route('adminCompleteOrder', ['id' => $order->id]) }}"
                                        class="text-green-500 hover:underline mr-2">Oznacz jako zrealizowane</a>
                                    <a href="{{ route('adminShowOrder', ['id' => $order->id]) }}"
                                        class="text-gray-500 hover:underline">Pokaż</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
