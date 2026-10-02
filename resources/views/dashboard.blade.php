@extends('layouts.main')
@section('title', 'PLN DIGI - Dashboard Pelanggan')

@section('content')
{{-- ══ HERO / WELCOME BANNER ══ --}}
<section class="relative -mt-16 bg-[#1B6EBB] text-white overflow-hidden pt-32 pb-16">
    <div class="absolute inset-0 bg-gradient-to-br from-[#2782C9] via-[#1B6EBB] to-[#0F477E]"></div>
    <div class="absolute inset-0 bg-[url('/images/hero-pln-1.jpg')] bg-cover bg-center opacity-20 mix-blend-overlay"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#1961A5]/95 via-[#1961A5]/60 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
        <div class="max-w-3xl py-6">
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight mb-3">
                Selamat Datang, {{ strtoupper(Auth::user()->name ?? 'PANJI') }}
            </h1>
            <p class="text-white/80 text-sm sm:text-base leading-relaxed">
                Kelola listrik Anda dalam satu platform digital terintegrasi PLN DIGI.
            </p>
        </div>
    </div>
</section>

{{-- ══ STATUS PELANGGAN / WARNING ══ --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6 relative z-30 mb-8">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-5 flex items-center justify-center gap-3 text-center">
        <span class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">!</span>
        <p class="text-xs sm:text-sm text-slate-600 font-medium">
            Anda belum memiliki data pelanggan PLN. Hubungi admin untuk pendaftaran.
        </p>
    </div>
</div>

{{-- ══ MENU LAYANAN UTAMA ══ --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
    <h2 class="text-lg font-bold text-slate-800 mb-6 tracking-tight">Layanan</h2>
    
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4">
        {{-- Tagihan --}}
        <a href="/produk/tagihan" class="bg-white p-6 rounded-2xl border border-slate-200/80 hover:shadow-lg hover:-translate-y-1 transition-all duration-200 flex flex-col items-center text-center group">
            <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center mb-3 group-hover:bg-[#1B6EBB] group-hover:text-white transition-colors">
                <i class="fas fa-file-invoice-dollar text-[#1B6EBB] group-hover:text-white text-base"></i>
            </div>
            <h3 class="font-bold text-sm text-slate-800 mb-0.5">Tagihan</h3>
            <p class="text-[11px] text-slate-400">Bayar & Cek</p>
        </a>

        {{-- Token --}}
        <a href="/produk/token" class="bg-white p-6 rounded-2xl border border-slate-200/80 hover:shadow-lg hover:-translate-y-1 transition-all duration-200 flex flex-col items-center text-center group">
            <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center mb-3 group-hover:bg-[#FDB813] group-hover:text-white transition-colors">
                <i class="fas fa-bolt text-amber-500 group-hover:text-white text-base"></i>
            </div>
            <h3 class="font-bold text-sm text-slate-800 mb-0.5">Token</h3>
            <p class="text-[11px] text-slate-400">Beli & Riwayat</p>
        </a>

        {{-- Self Metering --}}
        <a href="#" class="bg-white p-6 rounded-2xl border border-slate-200/80 hover:shadow-lg hover:-translate-y-1 transition-all duration-200 flex flex-col items-center text-center group">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center mb-3 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                <i class="fas fa-tachometer-alt text-emerald-600 group-hover:text-white text-base"></i>
            </div>
            <h3 class="font-bold text-sm text-slate-800 mb-0.5">Self Metering</h3>
            <p class="text-[11px] text-slate-400">Baca Meteran</p>
        </a>

        {{-- Monitoring --}}
        <a href="#" class="bg-white p-6 rounded-2xl border border-slate-200/80 hover:shadow-lg hover:-translate-y-1 transition-all duration-200 flex flex-col items-center text-center group">
            <div class="w-12 h-12 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center mb-3 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                <i class="fas fa-chart-line text-indigo-600 group-hover:text-white text-base"></i>
            </div>
            <h3 class="font-bold text-sm text-slate-800 mb-0.5">Monitoring</h3>
            <p class="text-[11px] text-slate-400">Grafik Pemakaian</p>
        </a>

        {{-- Simulasi --}}
        <a href="/simulasi" class="bg-white p-6 rounded-2xl border border-slate-200/80 hover:shadow-lg hover:-translate-y-1 transition-all duration-200 flex flex-col items-center text-center group">
            <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center mb-3 group-hover:bg-[#1B6EBB] group-hover:text-white transition-colors">
                <i class="fas fa-calculator text-[#1B6EBB] group-hover:text-white text-base"></i>
            </div>
            <h3 class="font-bold text-sm text-slate-800 mb-0.5">Simulasi</h3>
            <p class="text-[11px] text-slate-400">Estimasi Biaya</p>
        </a>

        {{-- Lapor Gangguan --}}
        <a href="#" class="bg-white p-6 rounded-2xl border border-slate-200/80 hover:shadow-lg hover:-translate-y-1 transition-all duration-200 flex flex-col items-center text-center group">
            <div class="w-12 h-12 rounded-xl bg-rose-50 border border-rose-100 flex items-center justify-center mb-3 group-hover:bg-rose-600 group-hover:text-white transition-colors">
                <i class="fas fa-exclamation-triangle text-rose-500 group-hover:text-white text-base"></i>
            </div>
            <h3 class="font-bold text-sm text-slate-800 mb-0.5">Lapor Gangguan</h3>
            <p class="text-[11px] text-slate-400">Report Outage</p>
        </a>

        {{-- PLN Reward --}}
        <a href="#" class="bg-white p-6 rounded-2xl border border-slate-200/80 hover:shadow-lg hover:-translate-y-1 transition-all duration-200 flex flex-col items-center text-center group">
            <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center mb-3 group-hover:bg-[#FDB813] group-hover:text-white transition-colors">
                <i class="fas fa-gift text-amber-500 group-hover:text-white text-base"></i>
            </div>
            <h3 class="font-bold text-sm text-slate-800 mb-0.5">PLN Reward</h3>
            <p class="text-[11px] text-slate-400">Poin & Hadiah</p>
        </a>

        {{-- Profil --}}
        <a href="#" class="bg-white p-6 rounded-2xl border border-slate-200/80 hover:shadow-lg hover:-translate-y-1 transition-all duration-200 flex flex-col items-center text-center group">
            <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center mb-3 group-hover:bg-slate-700 group-hover:text-white transition-colors">
                <i class="fas fa-user-cog text-slate-600 group-hover:text-white text-base"></i>
            </div>
            <h3 class="font-bold text-sm text-slate-800 mb-0.5">Profil</h3>
            <p class="text-[11px] text-slate-400">Pengaturan Akun</p>
        </a>
    </div>
</section>

{{-- ══ TRANSAKSI TERAKHIR ══ --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
    <h2 class="text-lg font-bold text-slate-800 mb-6 tracking-tight">Transaksi Terakhir</h2>

    <div class="bg-white rounded-2xl border border-slate-200/80 p-12 text-center flex flex-col items-center justify-center shadow-sm">
        <div class="w-14 h-14 bg-slate-100 rounded-full flex items-center justify-center text-slate-400 mb-3">
            <i class="fas fa-receipt text-xl"></i>
        </div>
        <p class="text-sm font-medium text-slate-500">Belum ada transaksi.</p>
    </div>
</section>

{{-- ══ SECTION INFO & PROMO TERKINI ══ --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-10">
    
    {{-- Header: flex justify-between bikin 'Lihat Semua' pindah ke Pojok Kanan --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl sm:text-2xl font-bold text-slate-800 tracking-tight flex items-center gap-2">
                <span>📣</span> Info & Promo Terkini
            </h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Inovasi kelistrikan ramah lingkungan dan edukasi PLN
            </p>
        </div>
        <a href="{{ route('news.index') }}" class="text-xs sm:text-sm font-semibold text-[#1B6EBB] hover:underline flex items-center gap-1">
            Lihat Semua &rarr;
        </a>
    </div>

    {{-- Grid Kartu Promo --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        {{-- Card Promo Cashback 30% --}}
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden flex flex-col hover:shadow-md transition duration-200">
            <div class="h-48 w-full bg-slate-100 relative overflow-hidden">
                <span class="absolute top-3 left-3 bg-blue-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-md tracking-wider uppercase z-10 shadow-sm">
                    PROMO
                </span>
                <img src="https://placehold.co/600x400/1B6EBB/FFF?text=Promo+Cashback+30%25" 
                     alt="Cashback Beli Token Listrik 30%" 
                     class="w-full h-full object-cover">
            </div>

            <div class="p-5 flex-1 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-1.5 text-xs text-slate-400 mb-2">
                        <i class="far fa-calendar-alt"></i>
                        <span>30 September 2026</span>
                    </div>
                    
                    <h3 class="font-bold text-base text-slate-800 mb-2 leading-snug hover:text-[#1B6EBB] transition">
                        Cashback Beli Token Listrik 30% Pakai E-Wallet Partner
                    </h3>
                    
                    <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">
                        Beli token listrik makin hemat melalui PLN DIGI! Dapatkan cashback saldo e-wallet hingga 30% untuk setiap transaksi selama periode promo.
                    </p>
                </div>

                <div class="pt-4 mt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('news.index') }}" class="text-xs font-semibold text-[#1B6EBB] hover:underline flex items-center gap-1">
                        Baca Selengkapnya &rsaquo;
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection