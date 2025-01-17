<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Larajobs Clone')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
<header class="bg-white shadow">
    <div class="container mx-auto px-4 py-4">
        <h1 class="text-xl font-bold"><a href="/">Larajobs Clone</a></h1>
    </div>
</header>

<main class="container mx-auto px-4 py-8">
    @yield('content')
</main>

<footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto px-4 text-center">
        <p>&copy; {{ date('Y') }} Larajobs Clone. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
