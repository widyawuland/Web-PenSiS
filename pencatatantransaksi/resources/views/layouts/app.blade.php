<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            @if(session('success'))
            <div class="alert bg-green-500 text-white">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('warning'))
            <div class="alert bg-yellow-500 text-black">
                {{ session('warning') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert bg-red-500 text-white">
                {{ session('error') }}
            </div>
        @endif
        

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const alerts = document.querySelectorAll('.alert');
                    if (alerts) {
                        setTimeout(() => {
                            alerts.forEach(alert => alert.remove());
                        }, 10000); // 10 detik
                    }
                });
            </script>
            
        </div>
    </body>
</html>
