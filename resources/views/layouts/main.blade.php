<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PLN DIGI - Layanan Listrik Digital Indonesia')</title>

    {{-- Favicon Logo PLN DIGI --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logoNavbar.png') }}">
    <!-- Google Fonts & Material Symbols -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- FontAwesome & Tailwind -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            500: '#1B6EBB',
                            600: '#145897',
                            700: '#0f4173',
                            800: '#0a2e52',
                            gold: '#FDB813',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F8FAFC;
            color: #0F172A;
            margin: 0;
            padding: 0;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }

        .chat-scroll::-webkit-scrollbar {
            width: 5px;
        }

        .chat-scroll::-webkit-scrollbar-track {
            background: #F1F5F9;
        }

        .chat-scroll::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 4px;
        }
    </style>
</head>

<body class="antialiased selection:bg-brand-500 selection:text-white flex flex-col min-h-screen">

    <!-- NAVBAR TUNGGAL RESMI PLN DIGI -->
    <nav class="sticky top-0 z-50 bg-brand-500/95 backdrop-blur-md border-b border-white/10 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">

                <!-- Logo Brand Navbar -->
                <a href="/" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.svg') }}" alt="PLN DIGI"
                        class="h-10 w-auto object-contain group-hover:scale-105 transition-transform">
                    <div>
                        <span class="text-xl font-black text-white tracking-wider block leading-none">PLN<span
                                class="text-brand-gold">DIGI</span></span>
                        <span class="text-[10px] text-blue-200 uppercase tracking-widest block font-medium mt-1">Layanan
                            Listrik Digital</span>
                    </div>
                </a>

                <!-- Nav Links Tengah -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="/"
                        class="px-4 py-2 rounded-xl text-xs font-semibold flex items-center gap-2 transition-all {{ request()->is('/') ? 'bg-white/20 text-white shadow-sm' : 'text-blue-100 hover:text-white hover:bg-white/10' }}">
                        <span class="material-symbols-outlined text-base">home</span> Beranda
                    </a>

                    <a href="/simulasi"
                        class="px-4 py-2 rounded-xl text-xs font-semibold flex items-center gap-2 transition-all {{ request()->is('simulasi*') ? 'bg-white/20 text-white shadow-sm' : 'text-blue-100 hover:text-white hover:bg-white/10' }}">
                        <span class="material-symbols-outlined text-base">calculate</span> Simulasi
                    </a>

                    <a href="/produk"
                        class="px-4 py-2 rounded-xl text-xs font-semibold flex items-center gap-2 transition-all {{ request()->is('produk*') ? 'bg-white/20 text-white shadow-sm' : 'text-blue-100 hover:text-white hover:bg-white/10' }}">
                        <span class="material-symbols-outlined text-base">grid_view</span> Produk
                    </a>

                    <a href="{{ Route::has('news.index') ? route('news.index') : '/berita' }}"
                        class="px-4 py-2 rounded-xl text-xs font-semibold flex items-center gap-2 transition-all {{ request()->is('berita*') || request()->is('news*') ? 'bg-white/20 text-white shadow-sm' : 'text-blue-100 hover:text-white hover:bg-white/10' }}">
                        <span class="material-symbols-outlined text-base">newspaper</span> Berita
                    </a>

                    {{-- MENU DASHBOARD --}}
                    @auth
                        <a href="/dashboard"
                            class="px-4 py-2 rounded-xl text-xs font-semibold flex items-center gap-2 transition-all {{ request()->is('dashboard*') ? 'bg-white/20 text-white shadow-sm' : 'text-blue-100 hover:text-white hover:bg-white/10' }}">
                            <span class="material-symbols-outlined text-base">dashboard</span> Dashboard
                        </a>
                    @endauth
                </div>

                <!-- Auth Action Buttons (Profile Dropdown Kapsul Style) -->
                <div class="flex items-center space-x-2.5">
                    @guest
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 sm:px-5 sm:py-2.5 rounded-xl text-xs font-semibold border border-white/30 text-white hover:bg-white/10 transition-all">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 sm:px-5 sm:py-2.5 rounded-xl text-xs font-bold bg-brand-gold text-brand-800 hover:bg-amber-300 shadow-md transition-all">
                            Buat Akun
                        </a>
                    @else
                        {{-- DROPDOWN PROFIL AKUN --}}
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false" type="button"
                                class="px-3.5 py-1.5 sm:px-4 sm:py-1.5 rounded-full text-xs font-semibold bg-white/10 hover:bg-white/20 text-white backdrop-blur-md border border-white/15 shadow-sm transition-all flex items-center gap-2.5 cursor-pointer focus:outline-none">

                                {{-- Avatar / Foto Profil --}}
                                <div
                                    class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-brand-gold text-slate-900 flex items-center justify-center font-black text-xs overflow-hidden shrink-0 shadow-xs">
                                    @if (auth()->user()->avatar_url)
                                        <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <i class="fas fa-user text-xs text-brand-800"></i>
                                    @endif
                                </div>
                                <span
                                    class="max-w-[120px] sm:max-w-[160px] truncate font-extrabold tracking-wide text-white">{{ auth()->user()->name }}</span>
                                <span
                                    class="material-symbols-outlined text-sm text-white/80 transition-transform duration-200"
                                    :class="{ 'rotate-180': open }">expand_more</span>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 text-slate-700 text-xs"
                                style="display: none;">

                                <div class="px-4 py-2.5 border-b border-slate-100 bg-slate-50/50 rounded-t-2xl">
                                    <p class="font-bold text-slate-900 truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-[10px] text-slate-400 truncate">{{ auth()->user()->email }}</p>
                                </div>

                                <a href="{{ route('profile.edit') }}"
                                    class="flex items-center space-x-2.5 px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 transition font-medium">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>Pengaturan Profil</span>
                                </a>

                                @if (auth()->user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="flex items-center space-x-2.5 px-4 py-2 text-xs text-gray-700 hover:bg-gray-50 transition font-medium">
                                        <i class="fas fa-shield-alt text-amber-500 text-xs"></i>
                                        <span>Panel Admin</span>
                                    </a>
                                @endif

                                <div class="border-t border-slate-100 my-1"></div>

                                {{-- Form Logout --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left flex items-center gap-2.5 px-4 py-2.5 text-rose-600 hover:bg-rose-50 transition-colors font-semibold">
                                        <span class="material-symbols-outlined text-base text-rose-500">logout</span> Keluar
                                        (Logout)
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>

            </div>
        </div>
    </nav>

    <!-- CONTENT BODY -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER EKSEKUTIF -->
    <footer class="bg-[#083759] text-white pt-16 pb-8 border-t border-slate-700/50 relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- AREA UTAMA FOOTER --}}
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 pb-12">

                <!-- 1. LOGO & BRANDING (KOLOM 4) -->
                <div class="md:col-span-4 space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.svg') }}" alt="PLN DIGI" class="h-10 w-auto object-contain">
                        <div>
                            <span class="text-xl font-black text-white tracking-wider block leading-none">PLN<span
                                    class="text-brand-gold">DIGI</span></span>
                            <span
                                class="text-[10px] text-blue-200 uppercase tracking-widest block font-medium mt-1">Layanan
                                Listrik Digital</span>
                        </div>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed max-w-sm">
                        Platform resmi ekosistem kelistrikan digital Indonesia. Menghubungkan pelanggan dengan kemudahan
                        transaksi tagihan, token prabayar, hingga pengaduan layanan secara cepat dan terintegrasi.
                    </p>
                </div>

                {{-- 2. NAVIGASI LAYANAN (KOLOM 2) --}}
                <div class="md:col-span-2 space-y-3">
                    <h4 class="text-xs font-bold text-white tracking-wider uppercase">Layanan</h4>
                    <ul class="space-y-2.5 text-xs text-slate-300 font-medium">
                        <li><a href="/produk" class="hover:text-brand-gold transition-colors">Bayar Tagihan
                                Listrik</a></li>
                        <li><a href="/produk" class="hover:text-brand-gold transition-colors">Beli Token Prabayar</a>
                        </li>
                        <li><a href="/simulasi" class="hover:text-brand-gold transition-colors">Simulasi Pasang
                                Baru</a></li>
                        <li><a href="/#faq" class="hover:text-brand-gold transition-colors">Pengaduan Gangguan</a>
                        </li>
                    </ul>
                </div>

                {{-- 3. NAVIGASI INFORMASI (KOLOM 2) --}}
                <div class="md:col-span-2 space-y-3">
                    <h4 class="text-xs font-bold text-white tracking-wider uppercase">Informasi</h4>
                    <ul class="space-y-2.5 text-xs text-slate-300 font-medium">
                        <li><a href="{{ Route::has('news.index') ? route('news.index') : '/berita' }}"
                                class="hover:text-brand-gold transition-colors">Kabar & Berita</a></li>
                        <li><a href="/#faq" class="hover:text-brand-gold transition-colors">Pusat Bantuan AI</a>
                        </li>
                        <li><a href="#" class="hover:text-brand-gold transition-colors">Kebijakan Privasi</a>
                        </li>
                        <li><a href="#" class="hover:text-brand-gold transition-colors">Syarat & Ketentuan</a>
                        </li>
                    </ul>
                </div>

                {{-- 4. ALAMAT & KONTAK RESMI (KOLOM 4) --}}
                <div class="md:col-span-4 space-y-3">
                    <h4 class="text-xs font-bold text-white tracking-wider uppercase">Kontak Resmi</h4>
                    <div class="space-y-2.5 text-xs text-slate-300 font-medium leading-relaxed">
                        <p class="flex items-start gap-2.5">
                            <span class="material-symbols-outlined text-brand-gold text-base mt-0.5">location_on</span>
                            <span>Jl. Trunojoyo Blok M I/135, Kebayoran Baru, Jakarta 12160 Indonesia</span>
                        </p>
                        <p class="flex items-center gap-2.5">
                            <span class="material-symbols-outlined text-brand-gold text-base">call</span>
                            <span>Telp : 123 (Call Center PLN 24 Jam)</span>
                        </p>
                        <p class="flex items-center gap-2.5">
                            <span class="material-symbols-outlined text-brand-gold text-base">mail</span>
                            <span>Email : pln123@pln.co.id</span>
                        </p>
                    </div>
                </div>

            </div>

            {{-- GARIS PEMBATAS BOTTOM --}}
            <div class="border-t border-white/20 pt-6">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">

                    {{-- COPYRIGHT TEXT --}}
                    <div
                        class="text-[11px] text-slate-300 font-medium uppercase tracking-wider text-center sm:text-left">
                        &copy; 2026 PT PLN (PERSERO) &mdash; PLATFORM KELISTRIKAN DIGITAL TERINTEGRASI
                    </div>

                    {{-- MEDIA SOSIAL & SCROLL TO TOP --}}
                    <div class="flex items-center gap-5">
                        <div class="flex items-center gap-2.5 text-white">
                            <a href="https://www.instagram.com/pln_id/" target="_blank"
                                class="w-8 h-8 rounded-lg bg-white/10 hover:bg-brand-gold hover:text-slate-900 flex items-center justify-center transition-all duration-300"
                                title="Instagram">
                                <i class="fab fa-instagram text-sm"></i>
                            </a>
                            <a href="https://www.youtube.com/@PTPLNPersero/featured" target="_blank"
                                class="w-8 h-8 rounded-lg bg-white/10 hover:bg-brand-gold hover:text-slate-900 flex items-center justify-center transition-all duration-300"
                                title="YouTube">
                                <i class="fab fa-youtube text-sm"></i>
                            </a>
                            <a href="https://x.com/pln_123" target="_blank"
                                class="w-8 h-8 rounded-lg bg-white/10 hover:bg-brand-gold hover:text-slate-900 flex items-center justify-center transition-all duration-300"
                                title="X (Twitter)">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/company/plniconplus/" target="_blank"
                                class="w-8 h-8 rounded-lg bg-white/10 hover:bg-brand-gold hover:text-slate-900 flex items-center justify-center transition-all duration-300"
                                title="LinkedIn">
                                <i class="fab fa-linkedin-in text-sm"></i>
                            </a>
                        </div>

                        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                            class="w-8 h-8 rounded-xl bg-white/10 hover:bg-brand-gold hover:text-slate-900 text-white flex items-center justify-center shadow-lg transition-all duration-300 border border-white/10 cursor-pointer"
                            title="Kembali ke Atas">
                            <span class="material-symbols-outlined text-base">keyboard_arrow_up</span>
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </footer>

</body>

</html>
