<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('wallet-solid-full.svg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-50">
    @yield('content-without-layout')
    @hasSection('content')
        @include('components.navbar')
        <main class="min-h-screen">
            @yield('content')
        </main>
        @include('components.footer')
    @endif
</body>
</html>
