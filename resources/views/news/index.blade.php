@extends('layouts.main')

@section('title', 'Berita & Informasi - PLN DIGI')

@section('content')
    <div class="bg-gray-50 min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header Judul & Breadcrumb --}}
            <div class="mb-8">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Berita & Informasi</h1>
                <nav class="text-sm text-gray-500">
                    <a href="/" class="hover:text-blue-600 transition-colors">Beranda</a> /
                    <span class="text-gray-700 font-medium">Berita & Informasi</span>
                </nav>
            </div>

            {{-- Filter Tab Kategori Berita --}}
            <div class="flex flex-wrap gap-2 mb-8">
                @php
                    $categories = [
                        'semua' => 'Semua',
                        'informasi' => 'Informasi',
                        'promo' => 'Promo',
                        'penghargaan' => 'Penghargaan',
                        'gangguan' => 'Gangguan',
                        'tips' => 'Tips & Trik',
                    ];
                    $currentKategori = request('kategori', 'semua');
                @endphp

                @foreach ($categories as $key => $label)
                    <a href="{{ route('news.index', ['kategori' => $key]) }}"
                        class="px-5 py-2.5 rounded-full text-sm font-semibold transition-all duration-200 {{ $currentKategori === $key ? 'bg-blue-600 text-white shadow-md shadow-blue-200' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            {{-- Grid Kartu Berita --}}
            @if ($news->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($news as $item)
                        <div
                            class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden group">

                            {{-- Container Gambar Berita --}}
                            <div class="relative w-full h-48 bg-blue-600 overflow-hidden">
                                {{-- Badge Kategori --}}
                                <span
                                    class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm text-blue-700 text-[10px] font-extrabold px-3 py-1 rounded-md uppercase tracking-wider z-10 shadow-sm">
                                    {{ $item->kategori == 'info' ? 'INFO' : strtoupper($item->kategori) }}
                                </span>

                                @if ($item->gambar)
                                    @php
                                        // Mencegah duplikasi path (misal: 'images/news/' + 'images/news/foto.jpg')
                                        $gambarClean = ltrim($item->gambar, '/');
                                        if (Str::startsWith($gambarClean, 'images/')) {
                                            $finalImagePath = $gambarClean;
                                        } elseif (Str::startsWith($gambarClean, 'news/')) {
                                            $finalImagePath = 'images/' . $gambarClean;
                                        } else {
                                            $finalImagePath = 'images/news/' . $gambarClean;
                                        }
                                    @endphp
                                    <img src="{{ asset($finalImagePath) }}" alt="{{ $item->judul }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        onerror="this.onerror=null; this.src='https://placehold.co/600x400/0284c7/ffffff?text=PLN+DIGI';">
                                @else
                                    <div class="w-full h-full bg-blue-700 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-white/50" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 01-2-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            {{-- Isi Konten Berita --}}
                            <div class="p-5 flex flex-col flex-grow">
                                {{-- Tanggal --}}
                                <div class="flex items-center text-xs text-gray-400 mb-2 font-medium">
                                    <svg class="w-4 h-4 mr-1 text-amber-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($item->published_at ?? $item->created_at)->translatedFormat('d F Y') }}
                                </div>

                                {{-- Judul --}}
                                <h3
                                    class="font-bold text-gray-800 text-base mb-3 line-clamp-2 leading-snug group-hover:text-blue-600 transition-colors">
                                    {{ $item->judul }}
                                </h3>

                                {{-- Ringkasan --}}
                                <p class="text-gray-500 text-xs mb-4 line-clamp-3 leading-relaxed flex-grow">
                                    {{ Str::limit(strip_tags($item->konten), 100) }}
                                </p>

                                {{-- Link Detail --}}
                                <a href="{{ route('news.show', $item->slug ?? $item->id) }}"
                                    class="inline-flex items-center text-xs font-bold text-blue-600 hover:text-blue-800 mt-auto pt-2">
                                    Baca Selengkapnya
                                    <svg class="w-3.5 h-3.5 ml-1 transition-transform group-hover:translate-x-1"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>

                {{-- Paginasi Kustom Rata Tengah --}}
                @if ($news->hasPages())
                    <div
                        class="mt-10 flex flex-col items-center justify-center gap-3 border-t border-gray-200 pt-6 text-center">

                        {{-- Keterangan Jumlah Data --}}
                        <p class="text-xs text-gray-500 font-medium">
                            Menampilkan <span class="font-bold text-gray-800">{{ $news->firstItem() }}</span> sampai
                            <span class="font-bold text-gray-800">{{ $news->lastItem() }}</span> dari
                            <span class="font-bold text-gray-800">{{ $news->total() }}</span> berita
                        </p>

                        {{-- Tombol Paginasi Rata Tengah --}}
                        <div class="inline-flex items-center justify-center gap-1.5 flex-wrap">
                            {{-- Tombol Sebelum --}}
                            @if ($news->onFirstPage())
                                <span
                                    class="w-9 h-9 flex items-center justify-center text-xs font-semibold text-gray-300 bg-gray-100 rounded-lg cursor-not-allowed border border-gray-200">
                                    &lsaquo;
                                </span>
                            @else
                                <a href="{{ $news->previousPageUrl() }}"
                                    class="w-9 h-9 flex items-center justify-center text-xs font-semibold text-gray-700 bg-white hover:bg-gray-100 rounded-lg transition border border-gray-200 shadow-xs">
                                    &lsaquo;
                                </a>
                            @endif

                            {{-- Nomor Halaman --}}
                            @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                                @if ($page == $news->currentPage())
                                    <span
                                        class="w-9 h-9 flex items-center justify-center text-xs font-bold text-white bg-blue-600 rounded-lg shadow-sm border border-blue-600">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="w-9 h-9 flex items-center justify-center text-xs font-semibold text-gray-700 bg-white hover:bg-gray-100 rounded-lg transition border border-gray-200 shadow-xs">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            {{-- Tombol Sesudah --}}
                            @if ($news->hasMorePages())
                                <a href="{{ $news->nextPageUrl() }}"
                                    class="w-9 h-9 flex items-center justify-center text-xs font-semibold text-gray-700 bg-white hover:bg-gray-100 rounded-lg transition border border-gray-200 shadow-xs">
                                    &rsaquo;
                                </a>
                            @else
                                <span
                                    class="w-9 h-9 flex items-center justify-center text-xs font-semibold text-gray-300 bg-gray-100 rounded-lg cursor-not-allowed border border-gray-200">
                                    &rsaquo;
                                </span>
                            @endif
                        </div>

                    </div>
                @endif
            @else
                {{-- State Ketika Berita Kosong --}}
                <div class="text-center py-16 bg-white rounded-2xl border border-dashed border-gray-200 my-8 shadow-sm">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-blue-50 text-blue-500 rounded-full mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 01-2-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">Belum ada berita dalam kategori ini</h3>
                    <p class="text-sm text-gray-500">Silakan pilih kategori lain.</p>
                </div>
            @endif

        </div>
    </div>
@endsection