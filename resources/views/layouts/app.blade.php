<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/admin.css')
    <title>
        @if (request()->is('dashboard'))
            Dashboard
        @elseif(request()->is('orders*'))
            Orders
        @elseif(request()->is('products*'))
            Products
        @else
            Meow Cafe
        @endif
    </title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
        rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('images/inr.ico') }}" type="image/x-icon" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <main class="flex">

        @include('partials.sidebar')

        <div class="ml-[240px] flex w-full relative">
            @include('partials.navbar')
            @yield('content')
    </main>
    </div>
    </main>

    @stack('scripts')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
</body>

</html>
