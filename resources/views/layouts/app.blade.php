<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PLN DIGI') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        <div class="min-h-screen flex flex-col">
            
            {{-- HAPUS / HILANGKAN @include('layouts.navigation') DI SINI AGAR TIDAK DOBEL --}}

            {{-- Page Heading (Jika Ada) --}}
            @isset($header)
                <header class="bg-white shadow-sm">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            {{-- Main Content (Mendukung $slot dan @yield('content')) --}}
            <main class="flex-grow">
                @if (isset($slot) && $slot->isNotEmpty())
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </main>

            {{-- Footer PLN DIGI --}}
            <footer class="bg-gray-900 text-white border-t border-gray-800 mt-auto py-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-400">
                    <div class="flex items-center space-x-2">
                        <span class="text-amber-400 font-extrabold text-lg">⚡ PLN DIGI</span>
                        <span>&copy; {{ date('Y') }} PT PLN (Persero). All rights reserved.</span>
                    </div>
                    <div class="flex space-x-6">
                        <a href="/" class="hover:text-white transition">Beranda</a>
                        <a href="/simulasi" class="hover:text-white transition">Simulasi</a>
                        <a href="/produk" class="hover:text-white transition">Produk</a>
                        <a href="{{ route('news.index') }}" class="hover:text-white transition">Berita</a>
                    </div>
                </div>
            </footer>

        </div>
    </body>
</html>