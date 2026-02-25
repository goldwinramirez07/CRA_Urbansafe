<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UrbanSafe')</title>
    @unless(app()->runningUnitTests())
        @vite('resources/css/app.css')
    @endunless
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <main>
        @yield('content')
    </main>
</body>
</html>