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
            <div class="">
                <h1 class="font-semibold text-light text-3xl mb-4 bg-custom-dark p-4 dynamic-shadow rounded-3">Manufaktura pizzy - zamówienia</h1>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive dynamic-shadow rounded-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="py-2 px-4 border-b align-middle text-center"><a href="{{ route('adminSorted', ['sort_by' => 'id', 'sort_order' => $sortBy == 'id' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}" class="text-dark">ID</a></th>
                                <th scope="col" class="py-2 px-4 border-b align-middle text-center"><a href="{{ route('adminSorted', ['sort_by' => 'placed_at', 'sort_order' => $sortBy == 'placed_at' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}" class="text-dark">Data złożenia</a></th>
                                <th scope="col" class="py-2 px-4 border-b align-middle text-center"><a href="{{ route('adminSorted', ['sort_by' => 'completed_at', 'sort_order' => $sortBy == 'completed_at' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}" class="text-dark">Data realizacji</a></th>
                                <th scope="col" class="py-2 px-4 border-b align-middle text-center"><a href="{{ route('adminSorted', ['sort_by' => 'total_price', 'sort_order' => $sortBy == 'total_price' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}" class="text-dark">Cena [zł]</a></th>
                                <th scope="col" class="py-2 px-4 border-b align-middle text-center"><a href="{{ route('adminSorted', ['sort_by' => 'total_weight', 'sort_order' => $sortBy == 'total_weight' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}" class="text-dark">Waga [g]</a></th>
                                <th scope="col" class="py-2 px-4 border-b align-middle text-center"><a href="{{ route('adminSorted', ['sort_by' => 'total_calories', 'sort_order' => $sortBy == 'total_calories' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}" class="text-dark">Kalorie [kcal]</a></th>
                                <th scope="col" class="py-2 px-4 border-b align-middle text-center">Adres odbiorcy</th>
                                <th scope="col" class="py-2 px-4 border-b align-middle text-center">Nr telefonu</th>
                                <th scope="col" class="py-2 px-4 border-b align-middle text-center">Email</th>
                                <th scope="col" class="py-2 px-4 border-b align-middle text-center">Metoda płatności</th>
                                <th scope="col" class="py-2 px-4 border-b align-middle text-center"></th>
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
                                    <td class="py-2 px-4 border-b align-middle text-center">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('adminEditOrder', ['id' => $order->id]) }}" class="text-blue-500 hover:underline m-1">
                                                <img src="/images/edit.png" alt="Edytuj" class="icon">
                                            </a>
                                            <a href="{{ route('adminDeleteOrder', ['id' => $order->id]) }}" class="text-red-500 hover:underline m-1">
                                                <img src="/images/delete.png" alt="Usuń" class="icon">
                                            </a>
                                            <a href="{{ route('adminCompleteOrder', ['id' => $order->id]) }}" class="text-green-500 hover:underline m-1">
                                                <img src="/images/completed.png" alt="Oznacz jako zrealizowane" class="icon">
                                            </a>
                                            <a href="{{ route('adminShowOrder', ['id' => $order->id]) }}" class="text-gray-500 hover:underline m-1">
                                                <img src="/images/show.png" alt="Pokaż" class="icon">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
