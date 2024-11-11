<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <livewire:styles />
    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body class="bg-slate-200 dark:bg-slate-700">
    @livewire('header')
    <main>
        {{ $slot }}
    </main>
    @stack('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
    <livewire:scripts />
</body>

</html>