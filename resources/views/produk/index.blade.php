@extends('layouts.main')
@section('title', 'Katalog Produk & Layanan - PLN DIGI')

@section('content')
{{-- Header Hero Section Produk (Dimensi & Skala Teks Presisi 100% Sama dengan Simulasi) --}}
<section class="relative bg-gradient-to-br from-[#001230] via-[#00265a] to-[#001a4d] text-white overflow-hidden">
    <div class="absolute inset-0 bg-[url('/images/hero-pln-1.jpg')] bg-cover bg-center opacity-15"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-16 md:pt-16 md:pb-20">
        {{-- Badge Pill --}}
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-white/10 backdrop-blur-md rounded-full text-amber-400 text-xs font-extrabold uppercase tracking-wider mb-4 border border-white/10 shadow-sm">
            <span>⚡ EKOSISTEM LAYANAN DIGITAL PLN</span>
        </div>

        {{-- Judul (Font Size Samakan Presisi dengan Simulasi) --}}
        <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight leading-tight">
            Semua Produk & Layanan <span class="text-amber-400">Kelistrikan</span>
        </h1>

        {{-- Deskripsi (Dikecilkan Skalanya Menjadi text-sm & max-w-lg Agar Tinggi Section Identik dengan Simulasi) --}}
        <p class="text-white/70 mt-2 max-w-lg text-sm leading-relaxed">
            Pelajari seluruh fitur unggulan yang tersedia di PLN DIGI. Mulai dari pembayaran tagihan, pembelian token, catat meter mandiri, hingga pelaporan gangguan 24 jam dalam satu portal terpadu.
        </p>
    </div>
</section>

{{-- Main Content Section --}}
<section class="py-12 md:py-16 bg-slate-50 min-h-[600px]" 
         x-data="{ 
             activeTab: 'semua', 
             searchQuery: '',
             productsList: {{ json_encode($products) }},
             
             get hasMatchingProducts() {
                 if (!this.searchQuery.trim()) return true;
                 const query = this.searchQuery.toLowerCase();
                 return this.productsList.some(p => {
                     const matchTab = (this.activeTab === 'semua' || this.activeTab === p.kategori);
                     const matchText = (p.nama + ' ' + p.ringkasan + ' ' + p.deskripsi).toLowerCase().includes(query);
                     return matchTab && matchText;
                 });
             }
         }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Guest Notice Banner (Saat belum login) --}}
        @guest
        <div class="mb-10 p-5 md:p-6 rounded-2xl bg-gradient-to-r from-amber-50 to-orange-50/70 border border-amber-200/90 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-5">
            <div class="flex items-start md:items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-[#FDB813]/20 text-[#B8780A] flex items-center justify-center flex-shrink-0 text-xl shadow-inner">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-800">Akses Penuh Layanan Pengguna</h3>
                    <p class="text-xs md:text-sm text-slate-600 mt-0.5 max-w-2xl leading-relaxed">
                        Anda dapat melihat dan mempelajari semua informasi produk di bawah ini. Untuk mengakses dan menggunakan layanan, silakan masuk ke akun PLN DIGI Anda.
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="{{ route('login') }}" class="btn-primary text-xs sm:text-sm px-5 py-2.5 shadow-sm hover:shadow transition-all">
                    <i class="fas fa-sign-in-alt text-xs"></i> Masuk Sekarang
                </a>
                <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-full text-xs sm:text-sm font-semibold bg-white border border-slate-300 text-slate-700 hover:bg-slate-100 transition-colors shadow-sm">
                    Daftar Akun
                </a>
            </div>
        </div>
        @else
        {{-- Auth Customer Summary Helper --}}
        <div class="mb-8 p-4 rounded-xl bg-blue-50/80 border border-blue-100 flex items-center justify-between text-xs text-slate-600">
            <div class="flex items-center gap-2">
                <i class="fas fa-check-circle text-[#00529C]"></i>
                <span>Anda sedang login sebagai <strong>{{ auth()->user()->name }}</strong>. Klik layanan apa saja di bawah ini untuk langsung menuju halaman dashboard terkait.</span>
            </div>
            <a href="{{ route('dashboard') }}" class="font-semibold text-[#00529C] hover:underline flex items-center gap-1">
                Buka Dashboard <i class="fas fa-arrow-right text-[10px]"></i>
            </a>
        </div>
        @endguest

        {{-- Filter Tabs & Live Search Bar --}}
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-8 pb-5 border-b border-slate-200">
            {{-- Tabs Kategori --}}
            <div class="flex flex-wrap gap-2">
                <button @click="activeTab = 'semua'"
                        :class="activeTab === 'semua' ? 'bg-[#00529C] text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                        class="px-4 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all">
                    Semua Layanan ({{ count($products) }})
                </button>
                <button @click="activeTab = 'pembayaran'"
                        :class="activeTab === 'pembayaran' ? 'bg-[#00529C] text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                        class="px-4 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all">
                    <i class="fas fa-wallet mr-1.5 text-xs opacity-70"></i> Pembayaran
                </button>
                <button @click="activeTab = 'pengawasan'"
                        :class="activeTab === 'pengawasan' ? 'bg-[#00529C] text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                        class="px-4 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all">
                    <i class="fas fa-chart-pie mr-1.5 text-xs opacity-70"></i> Pengawasan & Meteran
                </button>
                <button @click="activeTab = 'bantuan'"
                        :class="activeTab === 'bantuan' ? 'bg-[#00529C] text-white shadow-md' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200'"
                        class="px-4 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all">
                    <i class="fas fa-headset mr-1.5 text-xs opacity-70"></i> Bantuan & Reward
                </button>
            </div>

            {{-- Live Search Box --}}
            <div class="relative w-full lg:w-80">
                <div class="relative flex items-center">
                    <input type="text" 
                           x-model="searchQuery" 
                           placeholder="Cari layanan (cth: Token, Pasang Baru)..."
                           class="w-full pl-4 pr-12 py-2.5 text-xs sm:text-sm font-medium bg-white text-slate-800 border-2 border-slate-300 rounded-2xl focus:outline-none focus:border-[#00529C] focus:ring-4 focus:ring-[#00529C]/15 shadow-sm transition-all placeholder:text-slate-400">
                    
                    <template x-if="searchQuery.length > 0">
                        <button type="button" 
                                @click="searchQuery = ''" 
                                class="absolute right-11 text-slate-400 hover:text-slate-600 p-1 transition-colors">
                            <i class="fas fa-times-circle text-xs"></i>
                        </button>
                    </template>

                    <button type="button" 
                            @click="$el.previousElementSibling.focus()"
                            class="absolute right-1.5 w-8 h-8 rounded-xl bg-[#00529C] hover:bg-[#003d75] active:scale-95 text-white flex items-center justify-center shadow-sm transition-all cursor-pointer">
                        <i class="fas fa-search text-xs"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- WARNING / EMPTY STATE --}}
        <div x-show="!hasMatchingProducts" 
             x-transition
             class="mb-16 p-8 md:p-12 bg-white rounded-3xl border border-amber-200/80 shadow-sm text-center flex flex-col items-center justify-center">
            <div class="w-16 h-16 rounded-2xl bg-amber-100/80 text-amber-600 flex items-center justify-center mb-4 text-2xl shadow-inner">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-800 mb-1">Layanan Tidak Ditemukan</h3>
            <p class="text-xs md:text-sm text-slate-500 max-w-md mb-6 leading-relaxed">
                Tidak ada produk atau layanan yang cocok dengan kata kunci <span class="font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded border border-amber-200" x-text="'&quot;' + searchQuery + '&quot;'"></span>.
            </p>
            <button @click="searchQuery = ''" 
                    type="button"
                    class="px-5 py-2.5 rounded-full text-xs font-semibold bg-[#00529C] hover:bg-[#003d75] text-white shadow transition-all flex items-center gap-2">
                <i class="fas fa-redo text-[10px]"></i> Reset Pencarian
            </button>
        </div>

        {{-- Products Grid --}}
        <div x-show="hasMatchingProducts" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16 items-stretch">
            @foreach($products as $p)
            <div x-show="(activeTab === 'semua' || activeTab === '{{ $p['kategori'] }}') && ('{{ strtolower($p['nama'] . ' ' . $p['ringkasan'] . ' ' . $p['deskripsi']) }}'.includes(searchQuery.toLowerCase()))"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="card p-6 flex flex-col justify-between group hover:shadow-xl transition-all duration-300 hover:-translate-y-1 bg-blue-50/60 hover:bg-blue-50/90 border border-blue-100/80 rounded-3xl relative overflow-hidden h-full shadow-sm">
                
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#00529C] via-[#2D6DA8] to-[#FDB813] opacity-0 group-hover:opacity-100 transition-opacity"></div>

                <div class="flex-1 flex flex-col">
                    <div class="flex items-start justify-between gap-3 mb-5">
                        <div class="w-14 h-14 rounded-2xl bg-white flex items-center justify-center flex-shrink-0 text-xl shadow-sm border border-blue-100/60 group-hover:scale-105 transition-transform duration-300">
                            <i class="fas {{ $p['icon'] }} text-[#00529C]"></i>
                        </div>
                        <span class="inline-block px-3 py-1 rounded-full text-[11px] font-bold tracking-wide uppercase {{ $p['badge_bg'] }} shadow-2xs">
                            {{ $p['badge'] }}
                        </span>
                    </div>

                    <h2 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-[#00529C] transition-colors leading-snug">
                        {{ $p['nama'] }}
                    </h2>
                    <p class="text-xs text-slate-500 font-medium mb-4 leading-relaxed">
                        {{ $p['ringkasan'] }}
                    </p>

                    <p class="text-xs text-slate-600 leading-relaxed mb-5 bg-white p-4 rounded-2xl border border-blue-100/60 shadow-2xs">
                        {{ $p['deskripsi'] }}
                    </p>

                    <div class="space-y-2.5 mb-6 mt-auto">
                        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2.5">Fitur Unggulan</p>
                        @foreach($p['fitur'] as $fitur)
                        <div class="flex items-start gap-2.5 text-xs text-slate-700">
                            <i class="fas fa-check text-emerald-500 text-[10px] mt-1 flex-shrink-0"></i>
                            <span class="leading-tight font-medium">{{ $fitur }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-4 border-t border-blue-100/80 mt-4">
                    @auth
                        <a href="{{ $p['route'] }}"
                           class="w-full py-3 px-5 rounded-2xl text-xs font-bold flex items-center justify-center gap-2 bg-white text-slate-800 border border-blue-200/90 shadow-xs hover:bg-[#00529C] hover:text-white hover:border-[#00529C] hover:shadow-md active:bg-[#003d75] active:scale-[0.98] transition-all duration-200 group/btn cursor-pointer">
                            <span>{{ $p['btn_text'] }}</span>
                            <i class="fas fa-arrow-right text-[11px] text-slate-500 group-hover/btn:text-white group-hover/btn:translate-x-1.5 transition-all"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="w-full py-3 px-5 rounded-2xl text-xs font-bold flex items-center justify-center gap-2 bg-white text-slate-800 border border-blue-200/90 shadow-xs hover:bg-[#00529C] hover:text-white hover:border-[#00529C] hover:shadow-md active:bg-[#003d75] active:scale-[0.98] transition-all duration-200 group/btn cursor-pointer"
                           title="Silakan masuk untuk menggunakan layanan {{ $p['nama'] }}">
                            <i class="fas fa-lock text-[11px] text-slate-400 group-hover/btn:text-white transition-colors"></i>
                            <span>Masuk untuk Menggunakan</span>
                            <i class="fas fa-arrow-right text-[11px] text-slate-400 group-hover/btn:text-white group-hover/btn:translate-x-1.5 transition-all"></i>
                        </a>
                    @endauth
                </div>

            </div>
            @endforeach
        </div>

        {{-- Bottom Banner (Trust & Help) --}}
        <div class="bg-gradient-to-r from-[#00529C] to-[#003d75] rounded-3xl p-8 md:p-12 text-white shadow-xl relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-[#FDB813]/10 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8">
                <div class="max-w-2xl">
                    <span class="inline-block px-3.5 py-1 bg-white/10 rounded-full text-[#FDB813] text-xs font-bold uppercase tracking-wider mb-3.5 border border-white/10">
                        Pusat Bantuan & Layanan 24 Jam
                    </span>
                    <h3 class="text-2xl md:text-3xl font-extrabold tracking-tight mb-2.5">
                        Mengalami Kendala atau Pertanyaan Layanan?
                    </h3>
                    <p class="text-white/70 text-sm leading-relaxed">
                        Layanan PLN DIGI siap mendampingi kebutuhan kelistrikan Anda 24 jam sehari, 7 hari seminggu. Hubungi Contact Center resmi kami untuk bantuan instan atau lakukan simulasi pemasangan listrik.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full lg:w-auto flex-shrink-0">
                    <a href="tel:123" class="btn-secondary text-center justify-center text-sm py-3 px-6 shadow-lg whitespace-nowrap">
                        <i class="fas fa-phone-alt mr-2"></i> Hubungi PLN 123
                    </a>
                    <a href="{{ route('simulasi') }}" class="btn-outline text-center justify-center text-sm py-3 px-6 !border-white/30 hover:!bg-white/10 whitespace-nowrap">
                        <i class="fas fa-calculator mr-2"></i> Simulasi Pasang Baru
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection