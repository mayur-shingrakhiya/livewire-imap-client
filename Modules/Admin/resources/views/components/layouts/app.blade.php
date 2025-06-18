<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- [ ... Your existing <head> content ... ] -->
    <link rel="preconnect"
          href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
          rel="stylesheet" />

    <script defer
            src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @livewireStyles
</head>

<body>

    <!-- 🚀 TOP PROGRESS BAR -->
    <div x-data="{
        loading: false,
        init() {
            Livewire.hook('message.sent', () => this.loading = true)
            Livewire.hook('message.processed', () => this.loading = false)
        }
    }"
         class="relative">
        <!-- Top bar -->
        <div x-show="loading"
             x-transition
             class="fixed top-0 left-0 right-0 h-1 bg-blue-600 animate-pulse z-50"></div>

        <!-- Page content -->
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>
