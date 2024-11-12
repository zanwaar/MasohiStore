<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @stack('meta')
    @stack('css')

    <livewire:styles />

</head>

<body class="bg-slate-200 dark:bg-slate-700">

    @stack('body')
    <main>
        {{ $slot }}
    </main>


    @stack('appscripts')
    @stack('scripts')

    <livewire:scripts />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>

</html>