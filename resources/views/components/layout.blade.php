<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Coronatime</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/icon.png') }}">
</head>

<body {{ $attributes->merge(['class' => 'w-full min-h-screen']) }}>
    {{ $slot }}
</body>

</html>