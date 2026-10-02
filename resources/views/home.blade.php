@extends('layouts.main')
@section('title', 'PLN DIGI - Layanan Listrik Digital Indonesia')

@section('content')

    {{-- ══ HERO SECTION ══ --}}
    <section class="relative bg-[#1B6EBB] text-white overflow-hidden pt-12 lg:pt-16 pb-16 lg:pb-20">
        {{-- 1. Base Gradient Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-br from-[#2782C9] via-[#1B6EBB] to-[#0F477E]"></div>

        {{-- 2. Background Overlay Image --}}
        <div class="absolute inset-0 bg-[url('/images/hero-pln-1.jpg')] bg-cover bg-center opacity-40 mix-blend-overlay">
        </div>
        <div class="absolute inset-0 bg-[url('/images/hero-pln-1.jpg')] bg-cover bg-center opacity-10"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#1961A5]/95 via-[#1961A5]/50 to-transparent"></div>

        {{-- Hero Top Wrapper --}}
        <div class="relative w-full">
            {{-- Right Side: Curved Panel Gambar Petugas PLN --}}
            <div class="absolute right-0 top-0 bottom-0 w-[52%] z-10 hidden lg:block">
                <div class="absolute inset-0 overflow-hidden"
                    style="border-top-left-radius: 200px 50%; border-bottom-left-radius: 200px 50%; border-left: 2px solid rgba(253,184,19,0.35); box-shadow: -10px 0 40px rgba(253,184,19,0.12);">
                    <img src="{{ asset('images/thumbnail-pln.png') }}" class="w-full h-full object-cover object-[center_30%]"
                        alt="PLN Worker">
                    <div class="absolute inset-0 bg-gradient-to-l from-transparent via-transparent to-[#1961A5]/65"></div>
                    <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-[#2782C9]/65 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#0F477E]/85 to-transparent"></div>
                </div>

                {{-- Floating Yellow Icon Pills --}}
                <div class="absolute left-[-22px] inset-y-0 flex flex-col justify-center gap-7 z-30">
                    <div
                        class="w-[52px] h-[52px] bg-gradient-to-br from-[#FDB813] to-[#D4980A] rounded-2xl flex items-center justify-center shadow-[0_0_20px_rgba(253,184,19,0.45)] transform translate-x-4 border border-white/20">
                        <span class="material-symbols-outlined text-[#7a5500] text-2xl font-bold">payments</span>
                    </div>
                    <div
                        class="w-[52px] h-[52px] bg-gradient-to-br from-[#FDB813] to-[#D4980A] rounded-2xl flex items-center justify-center shadow-[0_0_20px_rgba(253,184,19,0.45)] transform -translate-x-1 border border-white/20">
                        <span class="material-symbols-outlined text-[#7a5500] text-2xl font-bold">bolt</span>
                    </div>
                    <div
                        class="w-[52px] h-[52px] bg-gradient-to-br from-[#FDB813] to-[#D4980A] rounded-2xl flex items-center justify-center shadow-[0_0_20px_rgba(253,184,19,0.45)] transform translate-x-4 border border-white/20">
                        <span class="material-symbols-outlined text-[#7a5500] text-2xl font-bold">power</span>
                    </div>
                </div>
            </div>

            {{-- Left Side: Text Headline --}}
            <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-xl pt-4 pb-8">
                    <div
                        class="inline-flex items-center gap-2.5 px-4 py-2 border border-white/20 rounded-full mb-8 backdrop-blur-sm bg-white/10">
                        <span class="w-2 h-2 rounded-full bg-[#FDB813] animate-pulse flex-shrink-0"></span>
                        <span class="text-[11px] font-extrabold uppercase tracking-widest text-white/90">Satu Portal, Ribuan
                            Kemudahan</span>
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-[1.12] mb-6 tracking-tight">
                        Satu portal,<br>
                        ribuan peluang<br>
                        <span class="text-[#FDB813]">pencari dan</span><br>
                        <span class="text-[#FDB813]">pemberi layanan</span>
                    </h1>

                    <p class="text-white/80 text-sm sm:text-base leading-relaxed max-w-md font-normal">
                        PLN DIGI menghubungkan pelanggan dengan layanan listrik digital terverifikasi dalam satu ekosistem
                        terpercaya.
                    </p>
                </div>
            </div>
        </div>

        {{-- ══ BOTTOM ACTION CARDS ══ --}}
        <div class="relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 pt-8 border-t border-white/10" id="produk">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                {{-- Left: Quick Action Cards --}}
                <div class="lg:col-span-5 flex flex-col gap-3.5">
                    <p class="text-[10px] font-extrabold uppercase tracking-widest text-white/50 pl-0.5">Aksi Cepat</p>

                    {{-- Bayar Tagihan --}}
                    <a href="/produk"
                        class="group flex items-center gap-4 p-4 rounded-2xl bg-white/10 border border-white/15 hover:bg-white/20 backdrop-blur-md transition-all shadow-md">
                        <div
                            class="w-11 h-11 rounded-xl bg-gradient-to-br from-[#FDB813] to-[#D4980A] flex items-center justify-center text-brand-800 shadow-md group-hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined text-[#7a5500] text-2xl font-bold">payments</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <span
                                    class="font-bold text-sm sm:text-base text-white group-hover:text-[#FDB813] transition-colors">Bayar
                                    Tagihan</span>
                                <span
                                    class="material-symbols-outlined text-white/40 text-base group-hover:text-[#FDB813] group-hover:translate-x-1 transition-all">chevron_right</span>
                            </div>
                            <p class="text-white/60 text-xs mt-0.5">Bayar tagihan listrik pascabayar Anda.</p>
                        </div>
                    </a>

                    {{-- Beli Token --}}
                    <a href="/produk"
                        class="group flex items-center gap-4 p-4 rounded-2xl bg-white/10 border border-white/15 hover:bg-white/20 backdrop-blur-md transition-all shadow-md">
                        <div
                            class="w-11 h-11 rounded-xl bg-gradient-to-br from-[#FDB813] to-[#D4980A] flex items-center justify-center text-brand-800 shadow-md group-hover:scale-105 transition-transform">
                            <span class="material-symbols-outlined text-[#7a5500] text-2xl font-bold">bolt</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <span
                                    class="font-bold text-sm sm:text-base text-white group-hover:text-[#FDB813] transition-colors">Beli
                                    Token</span>
                                <span
                                    class="material-symbols-outlined text-white/40 text-base group-hover:text-[#FDB813] group-hover:translate-x-1 transition-all">chevron_right</span>
                            </div>
                            <p class="text-white/60 text-xs mt-0.5">Isi ulang token listrik prabayar Anda.</p>
                        </div>
                    </a>
                </div>

                {{-- Right: Layanan Lainnya --}}
                <div class="lg:col-span-7">
                    <p class="text-[10px] font-extrabold uppercase tracking-widest text-white/50 mb-3.5 pl-0.5">Layanan
                        Lainnya</p>
                    <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-5 shadow-md">
                        <div
                            class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-0 divide-y sm:divide-y-0 sm:divide-x divide-white/10">

                            {{-- Feature 1: Simulasi --}}
                            <div class="flex flex-col pb-3 sm:pb-0 sm:pr-4 group/feat cursor-pointer"
                                onclick="window.location.href='/simulasi'">
                                <div class="flex items-start justify-between mb-3">
                                    <div
                                        class="w-10 h-10 border border-white/20 rounded-xl flex items-center justify-center bg-white/5 group-hover/feat:bg-[#FDB813]/20 transition-all">
                                        <span class="material-symbols-outlined text-[#FDB813] text-xl">calculate</span>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-white/30 text-sm group-hover/feat:text-white transition-colors">arrow_forward</span>
                                </div>
                                <span class="text-xs font-bold text-[#FDB813] mb-1">Simulasi</span>
                                <p class="text-white/60 text-xs">Simulasi Tarif & Pasang Baru</p>
                            </div>

                            {{-- Feature 2: Dashboard --}}
                            <div class="flex flex-col py-3 sm:py-0 sm:px-4 group/feat cursor-pointer"
                                onclick="window.location.href='/dashboard'">
                                <div class="flex items-start justify-between mb-3">
                                    <div
                                        class="w-10 h-10 border border-white/20 rounded-xl flex items-center justify-center bg-white/5 group-hover/feat:bg-[#FDB813]/20 transition-all">
                                        <span class="material-symbols-outlined text-[#FDB813] text-xl">history</span>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-white/30 text-sm group-hover/feat:text-white transition-colors">arrow_forward</span>
                                </div>
                                <span class="text-xs font-bold text-[#FDB813] mb-1">Dashboard</span>
                                <p class="text-white/60 text-xs">Riwayat Transaksi Listrik</p>
                            </div>

                            {{-- Feature 3: Berita --}}
                            <a href="#berita" class="flex flex-col pt-3 sm:pt-0 sm:pl-4 group/feat">
                                <div class="flex items-start justify-between mb-3">
                                    <div
                                        class="w-10 h-10 border border-white/20 rounded-xl flex items-center justify-center bg-white/5 group-hover/feat:bg-[#FDB813]/20 transition-all">
                                        <span class="material-symbols-outlined text-[#FDB813] text-xl">newspaper</span>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-white/30 text-sm group-hover/feat:text-white transition-colors">arrow_forward</span>
                                </div>
                                <span
                                    class="text-xs font-bold text-white group-hover/feat:text-[#FDB813] transition-colors">Berita
                                    & Promo</span>
                                <p class="text-white/60 text-xs">Informasi Resmi PLN</p>
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ══ APA ITU PLN DIGI  ══ --}}
    <section class="relative overflow-hidden py-16 sm:py-20 bg-slate-100">
        <div class="absolute inset-0 opacity-30 pointer-events-none">
            <div class="absolute inset-y-0 left-0 w-1/2 overflow-hidden">
                <img src="{{ asset('images/thumbnail-pln.png') }}" class="w-full h-full object-cover blur-sm"
                    alt="PLN BG">
            </div>
            <div class="absolute inset-y-0 right-0 w-1/2 overflow-hidden">
                <img src="{{ asset('images/hero-pln-1.jpg') }}" class="w-full h-full object-cover blur-sm" alt="PLN BG">
            </div>
        </div>

        <div class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6">
            <div
                class="bg-white/90 backdrop-blur-md rounded-3xl border border-white shadow-xl overflow-hidden p-8 sm:p-12 text-center">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mb-4">
                    Apa itu PLN DIGI?
                </h2>
                <p class="text-slate-700 text-sm sm:text-base leading-relaxed mb-4">
                    PLN DIGI menghubungkan pelanggan dengan berbagai layanan listrik digital. Kami hadir untuk membuat
                    pengelolaan listrik lebih mudah, lebih cepat, dan lebih dekat bagi siapa pun.
                </p>
                <p class="text-slate-500 text-xs sm:text-sm leading-relaxed mb-6">
                    Kami mewujudkan akses energi listrik yang merata, transparan, dan dapat dijangkau oleh seluruh
                    masyarakat Indonesia.
                </p>
                <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent mb-6"></div>
                <p class="text-amber-600 text-sm font-semibold italic">
                    &ldquo; Listrik untuk kehidupan yang lebih baik. &rdquo;
                </p>
            </div>
        </div>
    </section>

    {{-- ══ KEUNGGULAN SECTION: KENAPA PLN DIGI?  ══ --}}
    <section class="relative py-20 sm:py-28 overflow-hidden bg-slate-50" id="simulasi">

        {{-- 1. Gambar Background Pattern BUMN --}}
        <div class="absolute inset-0 z-0 pointer-events-none">
            <img src="{{ asset('images/bg-bumn.jpg') }}" alt="Background BUMN"
                class="w-full h-full object-cover object-center opacity-90">
        </div>

        {{-- 2. Soft Gradient Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-b from-white/40 via-transparent to-white/40 z-0 pointer-events-none">
        </div>

        {{-- 3. Konten Utama --}}
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header Section --}}
            <div class="text-center mb-20">
                <span
                    class="inline-block px-4 py-1.5 bg-white/90 backdrop-blur-md text-[#12517B] rounded-full text-xs font-extrabold uppercase tracking-wider border border-blue-100 shadow-sm mb-3">
                    Keunggulan
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1E293B] tracking-tight">
                    Kenapa PLN DIGI?
                </h2>
            </div>

            {{-- Grid 4 Kartu BUMN Style --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-16 gap-x-6">

                @php
                    $features = [
                        [
                            'icon' => 'verified_user',
                            'title' => 'Aman & Terpercaya',
                            'desc' =>
                                'Seluruh transaksi kelistrikan digital dilindungi dengan infrastruktur enkripsi tingkat tinggi serta otentikasi identitas bertingkat. Kami memastikan kerahasiaan data pribadi dan keamanan dana transaksi pengguna terjaga 100% secara transparan.',
                        ],
                        [
                            'icon' => 'support_agent',
                            'title' => '24/7 Tersedia',
                            'desc' =>
                                'Sistem siap melayani pembelian token, pembayaran tagihan pascabayar, hingga pelaporan gangguan kapan saja tanpa henti. Bebas antrean fisik dengan dukungan penuh asisten virtual cerdas terintegrasi sepanjang hari.',
                        ],
                        [
                            'icon' => 'payments',
                            'title' => 'Banyak Metode Bayar',
                            'desc' =>
                                'Dukungan ekosistem pembayaran terlengkap mulai dari Instant QRIS, berbagai e-Wallet nasional, hingga Virtual Account seluruh bank utama. Proses verifikasi instan secara real-time tanpa penundaan.',
                        ],
                        [
                            'icon' => 'receipt_long',
                            'title' => 'Riwayat Lengkap',
                            'desc' =>
                                'Akses dan unduh arsip lengkap histori pembelian token, penggunaan daya harian, serta struk pembayaran resmi kapan pun dibutuhkan. Memudahkan pencatatan dan analisis konsumsi energi listrik secara mandiri.',
                        ],
                    ];
                @endphp

                @foreach ($features as $f)
                    <div
                        class="relative bg-[#12517B] text-white rounded-[2rem] pt-14 pb-8 px-6 shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between text-center group border border-white/10 h-full">

                        {{-- ICON MELAYANG (FLOATING CIRCLE MEMOTONG ATAS KARTU) --}}
                        <div
                            class="absolute -top-10 left-1/2 -translate-x-1/2 w-20 h-20 rounded-full bg-white shadow-lg flex items-center justify-center p-2 border-4 border-slate-50 group-hover:scale-110 transition-transform duration-300">
                            <div
                                class="w-full h-full rounded-full bg-slate-50 flex items-center justify-center text-[#00A39E]">
                                <span class="material-symbols-outlined text-3xl font-bold">{{ $f['icon'] }}</span>
                            </div>
                        </div>

                        {{-- ISI KARTU --}}
                        <div>
                            <h3
                                class="text-base sm:text-[17px] font-bold text-white mb-3 mt-2 tracking-tight leading-snug">
                                {{ $f['title'] }}
                            </h3>
                            <p
                                class="text-xs sm:text-[13px] text-white/85 leading-relaxed font-normal text-justify sm:text-center">
                                {{ $f['desc'] }}
                            </p>
                        </div>

                        {{-- KETERANGAN TAMBAHAN DI BAGIAN BAWAH KARTU --}}
                        <div
                            class="pt-6 mt-4 border-t border-white/10 flex items-center justify-center gap-1.5 text-[11px] font-semibold text-blue-200 group-hover:text-white transition-colors">
                            <span>Layanan Terverifikasi</span>
                            <span class="material-symbols-outlined text-sm">check_circle</span>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- ══ STATS SECTION ══ --}}
    <section class="py-12 bg-[#2D6DA8] text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($stats as $s)
                    <div class="text-center">
                        <p class="text-2xl md:text-3xl font-extrabold text-white">{{ $s['value'] }}</p>
                        <p class="text-xs text-blue-100 mt-1 font-medium">{{ $s['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══ BERITA TERBARU (STYLE TATA LETAK KEMENTERIAN BUMN) ══ --}}
    <section class="py-16 sm:py-24 bg-slate-100/70 border-b border-slate-200/60" id="berita">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- CONTAINER UTAMA PUTIH BESAR ALA BUMN --}}
            <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-lg border border-slate-200/80">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

                    {{-- ══ KOLOM KIRI (7 KOLOM): INFORMASI, PENGHARGAAN, PROMO ══ --}}
                    <div class="lg:col-span-7 space-y-10">

                        {{-- 1. INFORMASI --}}
                        <div>
                            <div class="flex items-center justify-between border-b border-slate-100 pb-3 mb-4">
                                <h3 class="text-xl sm:text-2xl font-extrabold text-slate-800 tracking-tight">Informasi</h3>
                                <a href="{{ route('news.index', ['kategori' => 'informasi']) }}"
                                    class="text-xs font-bold text-[#12517B] hover:text-blue-700 uppercase tracking-wider flex items-center gap-1 transition-colors">
                                    <span>LIHAT SEMUA</span>
                                    <i class="fas fa-external-link-alt text-[10px]"></i>
                                </a>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                @forelse($informasiNews as $item)
                                    @php
                                        $img =
                                            $item->gambar && file_exists(public_path('images/news/' . $item->gambar))
                                                ? asset('images/news/' . $item->gambar)
                                                : ($item->gambar && file_exists(public_path('storage/' . $item->gambar))
                                                    ? asset('storage/' . $item->gambar)
                                                    : 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=600&q=80');
                                    @endphp
                                    <a href="{{ route('news.show', $item->slug ?? $item->id) }}"
                                        class="group block bg-white rounded-2xl overflow-hidden border border-slate-200/80 hover:shadow-md transition-all duration-300">
                                        <div class="h-36 w-full bg-slate-100 overflow-hidden relative">
                                            <img src="{{ $img }}" alt="{{ $item->judul }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                                onerror="this.src='https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=600&q=80';">
                                        </div>
                                        <div class="p-4">
                                            <p
                                                class="text-[11px] text-slate-400 font-medium mb-1.5 flex items-center gap-1">
                                                <i class="far fa-calendar-alt text-amber-500"></i>
                                                <span>{{ \Carbon\Carbon::parse($item->published_at ?? $item->created_at)->translatedFormat('l, d F Y') }}</span>
                                            </p>
                                            <h4
                                                class="text-xs sm:text-sm font-bold text-slate-800 line-clamp-2 leading-snug group-hover:text-[#12517B] transition-colors mb-2">
                                                {{ $item->judul }}
                                            </h4>
                                            <span class="inline-flex items-center text-[11px] font-bold text-[#12517B]">
                                                Baca Selengkapnya <i class="fas fa-external-link-alt text-[9px] ml-1"></i>
                                            </span>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-xs text-slate-400 col-span-2">Belum ada berita informasi.</p>
                                @endforelse
                            </div>
                        </div>

                        {{-- 2. PENGHARGAAN --}}
                        <div>
                            <div class="flex items-center justify-between border-b border-slate-100 pb-3 mb-4">
                                <h3 class="text-xl sm:text-2xl font-extrabold text-slate-800 tracking-tight">Penghargaan
                                </h3>
                                <a href="{{ route('news.index', ['kategori' => 'penghargaan']) }}"
                                    class="text-xs font-bold text-[#12517B] hover:text-blue-700 uppercase tracking-wider flex items-center gap-1 transition-colors">
                                    <span>LIHAT SEMUA</span>
                                    <i class="fas fa-external-link-alt text-[10px]"></i>
                                </a>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                @forelse($penghargaanNews as $item)
                                    @php
                                        $img =
                                            $item->gambar && file_exists(public_path('images/news/' . $item->gambar))
                                                ? asset('images/news/' . $item->gambar)
                                                : ($item->gambar && file_exists(public_path('storage/' . $item->gambar))
                                                    ? asset('storage/' . $item->gambar)
                                                    : 'https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?auto=format&fit=crop&w=600&q=80');
                                    @endphp
                                    <a href="{{ route('news.show', $item->slug ?? $item->id) }}"
                                        class="group block bg-white rounded-2xl overflow-hidden border border-slate-200/80 hover:shadow-md transition-all duration-300">
                                        <div class="h-36 w-full bg-slate-100 overflow-hidden relative">
                                            <img src="{{ $img }}" alt="{{ $item->judul }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                                onerror="this.src='https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?auto=format&fit=crop&w=600&q=80';">
                                        </div>
                                        <div class="p-4">
                                            <p
                                                class="text-[11px] text-slate-400 font-medium mb-1.5 flex items-center gap-1">
                                                <i class="far fa-calendar-alt text-amber-500"></i>
                                                <span>Tahun:
                                                    {{ \Carbon\Carbon::parse($item->published_at ?? $item->created_at)->format('Y') }}</span>
                                            </p>
                                            <h4
                                                class="text-xs sm:text-sm font-bold text-slate-800 line-clamp-2 leading-snug group-hover:text-[#12517B] transition-colors mb-2">
                                                {{ $item->judul }}
                                            </h4>
                                            <span class="inline-flex items-center text-[11px] font-bold text-[#12517B]">
                                                Baca Selengkapnya <i class="fas fa-external-link-alt text-[9px] ml-1"></i>
                                            </span>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-xs text-slate-400 col-span-2">Belum ada berita penghargaan.</p>
                                @endforelse
                            </div>
                        </div>

                        {{-- 3. BERITA / PROMO --}}
                        <div>
                            <div class="flex items-center justify-between border-b border-slate-100 pb-3 mb-4">
                                <h3 class="text-xl sm:text-2xl font-extrabold text-slate-800 tracking-tight">Promo</h3>
                                <a href="{{ route('news.index', ['kategori' => 'promo']) }}"
                                    class="text-xs font-bold text-[#12517B] hover:text-blue-700 uppercase tracking-wider flex items-center gap-1 transition-colors">
                                    <span>LIHAT SEMUA</span>
                                    <i class="fas fa-external-link-alt text-[10px]"></i>
                                </a>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                @forelse($promoNews as $item)
                                    @php
                                        $img =
                                            $item->gambar && file_exists(public_path('images/news/' . $item->gambar))
                                                ? asset('images/news/' . $item->gambar)
                                                : ($item->gambar && file_exists(public_path('storage/' . $item->gambar))
                                                    ? asset('storage/' . $item->gambar)
                                                    : 'https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?auto=format&fit=crop&w=600&q=80');
                                    @endphp
                                    <a href="{{ route('news.show', $item->slug ?? $item->id) }}"
                                        class="group block bg-white rounded-2xl overflow-hidden border border-slate-200/80 hover:shadow-md transition-all duration-300">
                                        <div class="h-36 w-full bg-slate-100 overflow-hidden relative">
                                            <img src="{{ $img }}" alt="{{ $item->judul }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                                onerror="this.src='https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?auto=format&fit=crop&w=600&q=80';">
                                        </div>
                                        <div class="p-4">
                                            <p
                                                class="text-[11px] text-slate-400 font-medium mb-1.5 flex items-center gap-1">
                                                <i class="far fa-calendar-alt text-amber-500"></i>
                                                <span>{{ \Carbon\Carbon::parse($item->published_at ?? $item->created_at)->translatedFormat('l, d F Y') }}</span>
                                            </p>
                                            <h4
                                                class="text-xs sm:text-sm font-bold text-slate-800 line-clamp-2 leading-snug group-hover:text-[#12517B] transition-colors mb-2">
                                                {{ $item->judul }}
                                            </h4>
                                            <span class="inline-flex items-center text-[11px] font-bold text-[#12517B]">
                                                Baca Selengkapnya <i class="fas fa-external-link-alt text-[9px] ml-1"></i>
                                            </span>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-xs text-slate-400 col-span-2">Belum ada berita promo.</p>
                                @endforelse
                            </div>
                        </div>

                    </div>

                    {{-- ══ KOLOM KANAN (5 KOLOM): VIDEO INSTAGRAM REEL ══ --}}
                    <div class="lg:col-span-5 sticky top-28 space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <h3 class="text-xl sm:text-2xl font-bold text-[#12517B] tracking-tight">Video</h3>
                            <a href="https://www.instagram.com/plndigi_official" target="_blank"
                                class="text-xs font-bold text-slate-500 hover:text-[#12517B] uppercase tracking-wider flex items-center gap-1 transition-colors">
                                <span>LIHAT SEMUA</span>
                                <i class="fas fa-external-link-alt text-[10px]"></i>
                            </a>
                        </div>

                        {{-- CONTAINER INSTAGRAM REEL EMBED --}}
                        <div class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-md flex flex-col">

                            {{-- Header Instagram --}}
                            <div class="p-3.5 bg-slate-50 flex items-center justify-between border-b border-slate-100">
                                <div class="flex items-center gap-2.5">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-tr from-amber-500 via-rose-500 to-purple-600 p-[1.5px]">
                                        <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                                            <i class="fab fa-instagram text-[12px] text-rose-600"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-1">
                                            <span class="text-xs font-bold text-slate-900">bumn_id</span>
                                            <i class="fas fa-check-circle text-blue-500 text-[11px]"></i>
                                        </div>
                                        <p class="text-[10px] text-slate-400">Audio asli &bull; Kementerian BUMN</p>
                                    </div>
                                </div>
                                <a href="https://www.instagram.com/reel/DcFrAcRvpyK/" target="_blank"
                                    class="px-3 py-1 bg-[#12517B] hover:bg-blue-800 text-white font-bold text-[11px] rounded-xl transition-colors">
                                    Lihat Profil
                                </a>
                            </div>

                            {{-- Reel Embed --}}
                            <div class="relative w-full overflow-hidden bg-slate-900" style="min-height: 480px;">
                                <iframe src="https://www.instagram.com/reel/DcFrAcRvpyK/embed"
                                    class="w-full h-[520px] border-0" frameborder="0" scrolling="no"
                                    allowtransparency="true">
                                </iframe>
                            </div>

                            {{-- Social Bar --}}
                            <div
                                class="p-3 bg-white border-t border-slate-100 flex items-center justify-between text-slate-700 text-xs font-bold">
                                <span class="flex items-center gap-1.5 text-rose-600">
                                    <i class="far fa-heart text-sm"></i> 499 suka
                                </span>
                                <a href="https://www.instagram.com/reel/DcFrAcRvpyK/" target="_blank"
                                    class="text-slate-400 hover:text-slate-600 font-normal text-[11px] transition">
                                    Lihat lainnya di Instagram &rarr;
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    {{-- Script Embed Instagram --}}
    <script async src="//www.instagram.com/embed.js"></script>

    {{-- ══ OMNIDIGI AI CHATBOT ══ --}}
    <section id="faq" class="py-16 bg-slate-100 border-t border-slate-200/60">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-6">
                <span
                    class="text-xs font-extrabold text-[#1B6EBB] tracking-wider uppercase bg-blue-50 px-3 py-1 rounded-full border border-blue-100">Pusat
                    Bantuan Digital</span>
                <h2 class="text-2xl font-extrabold text-slate-900 mt-2 tracking-tight">
                    Ada Pertanyaan? Tanyakan ke <span class="text-[#1B6EBB]">OMNIDIGI AI</span>
                </h2>
                <p class="text-slate-500 text-xs mt-1 max-w-md mx-auto font-normal">
                    Asisten virtual resmi PLN DIGI siap membantu menjawab seputar tagihan, token, dan simulasi 24/7.
                </p>
            </div>

            {{-- Container Chatbot Widget --}}
            <div x-data="omnidigiAiChat()"
                class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden flex flex-col mx-auto">

                {{-- Header Chatbot --}}
                <div
                    class="bg-gradient-to-r from-[#1B6EBB] to-[#145897] px-4 py-3 text-white flex items-center justify-between">
                    <div class="flex items-center space-x-2.5">
                        {{-- Avatar Maskot tanpa titik hijau --}}
                        <div
                            class="w-9 h-9 bg-white/20 rounded-xl p-1 flex items-center justify-center border border-white/30 shadow-inner overflow-hidden">
                            <img src="{{ asset('images/Maskot.svg') }}" alt="OMNIDIGI Maskot"
                                class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h3 class="font-bold text-xs sm:text-sm leading-tight text-white">OMNIDIGI AI Assistant</h3>
                            <p class="text-[10px] text-blue-100 mt-0.5">
                                Siap melayani 24/7
                            </p>
                        </div>
                    </div>

                    {{-- Badge Online  --}}
                    <div
                        class="bg-white/20 border border-white/30 px-2.5 py-1 rounded-full flex items-center gap-1.5 shadow-xs">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-[10px] font-medium text-white leading-none">Online</span>
                    </div>
                </div>

                {{-- Area Scroll Pesan Chat --}}
                <div id="omnidigi-home-chat-box"
                    class="h-[320px] max-h-[320px] overflow-y-auto p-4 space-y-3 bg-slate-50/50 chat-scroll">
                    <template x-for="(msg, index) in messages" :key="index">
                        <div class="w-full">
                            <!-- Pesan dari User -->
                            <template x-if="msg.sender === 'user'">
                                <div class="flex justify-end my-1">
                                    <div
                                        class="bg-[#1B6EBB] text-white rounded-2xl rounded-tr-none px-4 py-2.5 text-xs max-w-[80%] whitespace-pre-line text-left leading-relaxed font-normal shadow-xs">
                                        <span x-text="msg.text"></span>
                                    </div>
                                </div>
                            </template>

                            <!-- Pesan dari AI Bot -->
                            <template x-if="msg.sender !== 'user'">
                                <div class="flex items-start gap-2.5 my-1">
                                    <div
                                        class="w-8 h-8 rounded-full bg-blue-100 p-1 shrink-0 border border-blue-200 shadow-xs flex items-center justify-center">
                                        <img src="{{ asset('images/Maskot.svg') }}" alt="AI Bot"
                                            class="w-full h-full object-contain">
                                    </div>
                                    <div class="bg-white border border-slate-200 shadow-xs rounded-2xl rounded-tl-none px-4 py-2.5 text-xs max-w-[80%] whitespace-pre-line text-left leading-relaxed font-medium"
                                        style="color: #0f172a !important;">
                                        <span x-text="msg.text" style="color: #0f172a !important;"></span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    {{-- Indikator Mengetik AI --}}
                    <div x-show="loading" class="flex items-start gap-2.5 my-1">
                        <div
                            class="w-8 h-8 rounded-full bg-blue-100 p-1 shrink-0 border border-blue-200 shadow-xs flex items-center justify-center">
                            <img src="{{ asset('images/Maskot.svg') }}" alt="AI Bot"
                                class="w-full h-full object-contain animate-bounce">
                        </div>
                        <div
                            class="bg-white border border-slate-200 text-slate-500 rounded-2xl rounded-tl-none px-4 py-2.5 text-xs shadow-xs font-medium">
                            <div class="flex items-center gap-2">
                                <span
                                    class="material-symbols-outlined text-[#1B6EBB] animate-spin text-xs">progress_activity</span>
                                <span>OMNIDIGI AI sedang mengetik...</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- FAQ CHIPS (Scrollbar Hilang) --}}
                <div
                    class="px-3 py-2 bg-slate-100/80 border-t border-slate-200 flex items-center gap-1.5 overflow-x-auto [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden">
                    <span class="text-[10px] font-bold text-slate-400 uppercase whitespace-nowrap pl-1">Cepat:</span>
                    <template x-for="(prompt, pIdx) in quickPrompts" :key="pIdx">
                        <button type="button" @click="sendQuickPrompt(prompt)"
                            class="bg-white hover:bg-blue-50 text-[#1B6EBB] border border-slate-200 hover:border-[#1B6EBB] text-[11px] px-2.5 py-1 rounded-full shadow-xs transition whitespace-nowrap flex items-center gap-1 font-medium flex-shrink-0 cursor-pointer">
                            <span class="material-symbols-outlined text-amber-500 text-[12px]">lightbulb</span>
                            <span x-text="prompt"></span>
                        </button>
                    </template>
                </div>

                {{-- Form Input Text Chatbot --}}
                <form @submit.prevent="sendMessage()"
                    class="p-3 bg-white border-t border-slate-200 flex items-center gap-2">
                    <input type="text" x-model="inputMessage" placeholder="Ketik pertanyaan Anda di sini..."
                        class="flex-1 text-xs p-2.5 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#1B6EBB] bg-slate-50 transition text-slate-800"
                        :disabled="loading">
                    <button type="submit"
                        class="bg-[#1B6EBB] hover:bg-[#145897] active:scale-95 text-white font-bold text-xs px-4 py-2.5 rounded-xl transition disabled:opacity-50 flex items-center gap-1 flex-shrink-0 shadow-md cursor-pointer"
                        :disabled="loading || !inputMessage.trim()">
                        <span>Kirim</span>
                        <span class="material-symbols-outlined text-xs">send</span>
                    </button>
                </form>

            </div>
        </div>
    </section>

    {{-- SCRIPT ALPINE CHATBOT AI --}}
    <script>
        function omnidigiAiChat() {
            return {
                messages: [{
                    sender: 'bot',
                    text: 'Halo! Selamat datang di PLN DIGI. Saya OMNIDIGI AI, asisten virtual Anda. Silakan klik tombol pertanyaan cepat di atas kotak ketik atau tanyakan langsung hal seputar tagihan listrik, token prabayar, simulasi pasang baru, atau layanan kelistrikan lainnya.'
                }],
                inputMessage: '',
                loading: false,
                quickPrompts: [
                    'Bagaimana cara bayar tagihan listrik?',
                    'Cara beli token prabayar',
                    'Berapa biaya simulasi pasang baru?'
                ],

                async sendMessage() {
                    const text = this.inputMessage.trim();
                    if (!text || this.loading) return;

                    // 1. Tampilkan pesan user
                    this.messages.push({
                        sender: 'user',
                        text: text
                    });
                    this.inputMessage = '';
                    this.loading = true;
                    this.scrollToBottom();

                    try {
                        // 2. Request ke endpoint API
                        const response = await fetch('/api/chat', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                message: text
                            })
                        });

                        const data = await response.json();

                        // 3. Tangkap teks balasan
                        let botReply = data.reply || data.message || data.response;

                        if (!botReply || typeof botReply !== 'string') {
                            botReply = 'Maaf, OMNIDIGI AI belum bisa memberikan jawaban saat ini.';
                        }

                        this.messages.push({
                            sender: 'bot',
                            text: botReply
                        });

                    } catch (error) {
                        console.error('Chat Error:', error);
                        this.messages.push({
                            sender: 'bot',
                            text: 'Maaf, terjadi gangguan jaringan. Silakan coba beberapa saat lagi.'
                        });
                    } finally {
                        this.loading = false;
                        this.scrollToBottom();
                    }
                },

                sendQuickPrompt(promptText) {
                    this.inputMessage = promptText;
                    this.sendMessage();
                },

                scrollToBottom() {
                    setTimeout(() => {
                        const box = document.getElementById('omnidigi-home-chat-box');
                        if (box) {
                            box.scrollTop = box.scrollHeight;
                        }
                    }, 100);
                }
            }
        }
    </script>

    {{-- ══ SECTION KOLABORASI & SINERGI (EFEK BAYANGAN HALUS PEMBATAS) ══ --}}
    <section class="relative pt-14 pb-16 overflow-hidden bg-[#1B6EBB] text-white">

        {{-- JUDUL SECTION --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 text-center relative z-10">
            <h3 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight">
                Berkolaborasi dan Bersinergi Bersama
            </h3>
            <p class="text-xs text-blue-100/90 mt-1.5 font-normal max-w-xl mx-auto">
                PLN DIGI terintegrasi dengan ekosistem Kementerian, BUMN, dan Lembaga Negara Republik Indonesia.
            </p>
        </div>

        {{-- RUNNING LOGO MARQUEE --}}
        <div class="relative w-full py-2 overflow-hidden flex items-center">

            {{-- Fade Shadow Mask Kiri & Kanan --}}
            <div
                class="absolute left-0 top-0 bottom-0 w-16 sm:w-28 bg-gradient-to-r from-[#1B6EBB] to-transparent z-20 pointer-events-none">
            </div>
            <div
                class="absolute right-0 top-0 bottom-0 w-16 sm:w-28 bg-gradient-to-l from-[#1B6EBB] to-transparent z-20 pointer-events-none">
            </div>

            {{-- TRACK MARQUEE DENGAN KARTU PUTIH SOLID --}}
            <div class="flex space-x-4 sm:space-x-6 animate-marquee whitespace-nowrap">
                @php
                    $logos = [
                        'bumn.png',
                        'esdm.png',
                        'komdigi.png',
                        'kemenkeu.png',
                        'bappenas.png',
                        'panrb.png',
                        'bssn.png',
                        'atr-bpn.png',
                        'KLHK.png',
                        'kemenhub.png',
                        'mandiri.png',
                        'bri.png',
                        'bni.png',
                        'telkom.png',
                        'pertamina.png',
                        'pos-indo.png',
                    ];
                @endphp

                {{-- Set 1 --}}
                @foreach ($logos as $logo)
                    <div
                        class="inline-flex items-center justify-center w-28 sm:w-32 h-28 sm:h-32 bg-white rounded-2xl p-3.5 shadow-lg border border-white/20 flex-shrink-0 hover:scale-105 transition-all duration-300">
                        <img src="{{ asset('images/kolaborasi/' . $logo) }}" alt="Logo Instansi"
                            class="max-h-16 sm:max-h-20 max-w-[85px] sm:max-w-[100px] object-contain">
                    </div>
                @endforeach

                {{-- Set 2 (Duplikasi untuk Smooth Infinite Loop) --}}
                @foreach ($logos as $logo)
                    <div
                        class="inline-flex items-center justify-center w-28 sm:w-32 h-28 sm:h-32 bg-white rounded-2xl p-3.5 shadow-lg border border-white/20 flex-shrink-0 hover:scale-105 transition-all duration-300">
                        <img src="{{ asset('images/kolaborasi/' . $logo) }}" alt="Logo Instansi"
                            class="max-h-16 sm:max-h-20 max-w-[85px] sm:max-w-[100px] object-contain">
                    </div>
                @endforeach
            </div>

        </div>

        {{-- EFEK BAYANGAN HALUS (SOFT GRADIENT SHADOW PEMBATAS BAWAH) --}}
        <div
            class="absolute bottom-0 left-0 right-0 h-8 bg-gradient-to-t from-black/20 via-black/5 to-transparent pointer-events-none z-10">
        </div>
    </section>

    {{-- STYLES ANIMASI MARQUEE --}}
    <style>
        @keyframes marquee {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(0%);
            }
        }

        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 35s linear infinite;
        }

        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>


    {{-- Script Alpine.js Handler untuk Chatbot --}}
    <script>
        function omnidigiAiChat() {
            return {
                loading: false,
                inputMessage: '',
                messages: [{
                    sender: 'bot',
                    text: 'Halo! Selamat datang di PLN DIGI. Saya OMNIDIGI AI, asisten virtual Anda. Silakan klik tombol pertanyaan cepat di atas kotak ketik atau tanyakan langsung hal seputar tagihan listrik, token prabayar, simulasi pasang baru, atau layanan kelistrikan lainnya.'
                }],
                quickPrompts: [
                    'Bagaimana cara bayar tagihan listrik?',
                    'Cara beli token prabayar',
                    'Berapa biaya simulasi pasang baru?',
                    'Bagaimana melapor gangguan listrik?'
                ],
                sendQuickPrompt(promptText) {
                    this.inputMessage = promptText;
                    this.sendMessage();
                },
                async sendMessage() {
                    if (!this.inputMessage.trim()) return;

                    const userText = this.inputMessage;
                    this.messages.push({
                        sender: 'user',
                        text: userText
                    });
                    this.inputMessage = '';
                    this.loading = true;

                    this.scrollToBottom();

                    try {
                        const response = await fetch("{{ route('omnidigi.ai.chat') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                message: userText
                            })
                        });

                        const data = await response.json();

                        if (data.status === 'success') {
                            this.messages.push({
                                sender: 'bot',
                                text: data.reply
                            });
                        } else {
                            this.messages.push({
                                sender: 'bot',
                                text: 'Maaf, ' + (data.message || 'terjadi kendala pada layanan OMNIDIGI AI.')
                            });
                        }
                    } catch (error) {
                        this.messages.push({
                            sender: 'bot',
                            text: 'Maaf, terjadi kesalahan koneksi jaringan server.'
                        });
                    } finally {
                        this.loading = false;
                        this.scrollToBottom();
                    }
                },
                scrollToBottom() {
                    this.$nextTick(() => {
                        const container = document.getElementById('omnidigi-home-chat-box');
                        if (container) {
                            container.scrollTop = container.scrollHeight;
                        }
                    });
                }
            }
        }
    </script>

   {{-- ══ CTA FOOTER BANNER ══ --}}
    <section class="bg-[#1B6EBB] py-12 text-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-white">
                        Siap beralih ke <span class="text-[#FDB813]">layanan digital?</span>
                    </h2>
                    <p class="text-blue-100 text-xs sm:text-sm mt-1.5 max-w-lg font-normal">
                        Bergabunglah dengan jutaan pelanggan yang telah mempercayai PLN DIGI.
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    @guest
                        <a href="{{ route('register') }}"
                            class="px-5 py-3 rounded-xl bg-[#FDB813] text-brand-800 font-bold text-xs sm:text-sm shadow-md hover:bg-amber-300 transition">Mulai
                            cari layanan &rarr;</a>
                        <a href="{{ route('login') }}"
                            class="px-5 py-3 rounded-xl border border-white/30 text-white font-semibold text-xs sm:text-sm hover:bg-white/10 transition">Masuk</a>
                    @else
                        <a href="{{ url('/produk') }}"
                            class="px-5 py-3 rounded-xl bg-[#FDB813] text-brand-800 font-bold text-xs sm:text-sm shadow-md hover:bg-amber-300 transition">Mulai
                            Transaksi &rarr;</a>
                    @endguest
                </div>
            </div>
        </div>
    </section>

@endsection
