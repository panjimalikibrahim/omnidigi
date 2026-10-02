@extends('layouts.main')
@section('title', $article->judul . ' - PLN DIGI')

@section('content')
    {{-- Header Hero (Presisi Ukuran dengan Simulasi & Produk) --}}
    <section class="relative bg-gradient-to-br from-[#001230] via-[#00265a] to-[#001a4d] text-white overflow-hidden">
        <div class="absolute inset-0 bg-[url('/images/hero-pln-1.jpg')] bg-cover bg-center opacity-15"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-14 md:pt-16 md:pb-16">

            <a href="{{ route('news.index') }}"
                class="inline-flex items-center text-white/70 hover:text-white text-xs font-semibold mb-4 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Semua Berita
            </a>

            <div class="flex items-center gap-3 mb-3">
                <span
                    class="inline-block px-3 py-1 rounded-full text-[11px] font-extrabold uppercase tracking-wider bg-white/10 text-[#FDB813] border border-white/10 backdrop-blur-sm">
                    {{ $article->label_kategori ?? strtoupper($article->kategori) }}
                </span>
                <span class="text-xs text-white/70 font-medium">
                    {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y') : \Carbon\Carbon::parse($article->created_at)->translatedFormat('d F Y') }}
                </span>
            </div>

            <h1 class="text-2xl md:text-4xl font-extrabold leading-snug max-w-4xl tracking-tight">
                {{ $article->judul }}
            </h1>
        </div>
    </section>

    {{-- Main Content & Sidebar Ala BUMN --}}
    <section class="py-10 md:py-14 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

                {{-- KOLOM KIRI: KONTEN UTAMA BERITA (8 Kolom) --}}
                <div class="lg:col-span-8 bg-white p-6 md:p-8 rounded-3xl border border-slate-200/80 shadow-sm">

                    {{-- Penulis & Tombol Sosmed (IG, X, YouTube, Copy Link) --}}
                    <div class="flex flex-wrap items-center justify-between border-b border-slate-100 pb-5 mb-6 gap-4">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-2xl bg-blue-50 text-[#00529C] font-bold flex items-center justify-center text-base border border-blue-100">
                                <i class="fas fa-user-edit"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-800">Humas PLN DIGI</p>
                                <p class="text-[11px] text-slate-400">Tim Redaksi Official</p>
                            </div>
                        </div>

                        {{-- Tombol Bagikan Media Sosial --}}
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-slate-400 font-medium mr-1">Bagikan:</span>

                            {{-- WhatsApp --}}
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($article->judul . ' ' . url()->current()) }}"
                                target="_blank"
                                class="w-9 h-9 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center text-sm transition-all duration-200 shadow-sm hover:scale-105"
                                title="Bagikan via WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>

                            {{-- X (Twitter) - Menggunakan SVG Putih Agar Dijamin Tampak Jelas --}}
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->judul) }}&url={{ urlencode(url()->current()) }}"
                                target="_blank"
                                class="w-9 h-9 rounded-full bg-black hover:bg-slate-800 text-white flex items-center justify-center text-sm transition-all duration-200 shadow-sm hover:scale-105"
                                title="Bagikan ke X (Twitter)">
                                <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z">
                                    </path>
                                </svg>
                            </a>

                            {{-- Instagram --}}
                            <a href="https://www.instagram.com" target="_blank"
                                class="w-9 h-9 rounded-full bg-gradient-to-tr from-amber-500 via-rose-500 to-purple-600 hover:opacity-90 text-white flex items-center justify-center text-sm transition-all duration-200 shadow-sm hover:scale-105"
                                title="Bagikan ke Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            {{-- Salin Link --}}
                            <button
                                onclick="navigator.clipboard.writeText('{{ url()->current() }}'); alert('Link berita berhasil disalin!');"
                                type="button"
                                class="w-9 h-9 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center text-xs transition-all duration-200 shadow-sm hover:scale-105 cursor-pointer"
                                title="Salin Tautan">
                                <i class="fas fa-link"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Header Image (Handling Path Foto Berita Supaya Tampil Mulus) --}}
                    @php
                        $imgPath = null;
                        if ($article->gambar) {
                            if (file_exists(public_path('images/news/' . $article->gambar))) {
                                $imgPath = asset('images/news/' . $article->gambar);
                            } elseif (file_exists(public_path('storage/' . $article->gambar))) {
                                $imgPath = asset('storage/' . $article->gambar);
                            } else {
                                $imgPath = asset($article->gambar);
                            }
                        }
                    @endphp

                    <div
                        class="rounded-2xl overflow-hidden mb-8 shadow-sm max-h-[420px] bg-slate-100 border border-slate-100">
                        @if ($article->gambar)
                            <img src="{{ $imgPath }}" alt="{{ $article->judul }}" class="w-full h-full object-cover"
                                onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?auto=format&fit=crop&w=1200&q=80';">
                        @else
                            <img src="https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?auto=format&fit=crop&w=1200&q=80"
                                alt="{{ $article->judul }}" class="w-full h-full object-cover">
                        @endif
                    </div>

                    {{-- Article Content --}}
                    <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed text-sm md:text-base mb-8">
                        {!! nl2br(e($article->konten)) !!}
                    </div>

                </div>

                {{-- KOLOM KANAN: SIDEBAR TERPOPULER ALA BUMN (4 Kolom) --}}
                <div class="lg:col-span-4 space-y-6 sticky top-24">
                    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm">

                        {{-- Header Sidebar --}}
                        <div class="flex items-center justify-between mb-6 pb-3 border-b border-slate-100">
                            <span
                                class="bg-[#00529C] text-white text-xs font-black uppercase px-3.5 py-1.5 rounded-xl tracking-wider">
                                TERPOPULER
                            </span>
                            <div class="h-1 flex-1 bg-blue-100 ml-3 rounded-full"></div>
                        </div>

                        {{-- List Berita Terpopuler --}}
                        <div class="space-y-5">
                            @php
                                $popularList = $popularNews ?? $related;
                            @endphp

                            @forelse($popularList as $index => $pItem)
                                <a href="{{ route('news.show', $pItem->slug ?? $pItem->id) }}"
                                    class="flex items-start gap-3.5 group transition">
                                    {{-- Angka Nomor Urut Besar Ala BUMN --}}
                                    <span
                                        class="text-3xl font-black text-slate-300 group-hover:text-[#00529C] transition-colors leading-none w-6 flex-shrink-0 text-center">
                                        {{ $index + 1 }}
                                    </span>

                                    <div class="flex-1">
                                        <h4
                                            class="text-xs font-bold text-slate-800 group-hover:text-[#00529C] transition-colors line-clamp-2 leading-snug mb-1">
                                            {{ $pItem->judul }}
                                        </h4>
                                        <span class="text-[10px] text-slate-400 font-medium">
                                            {{ $pItem->published_at ? \Carbon\Carbon::parse($pItem->published_at)->format('d M Y') : \Carbon\Carbon::parse($pItem->created_at)->format('d M Y') }}
                                        </span>
                                    </div>
                                </a>
                            @empty
                                <p class="text-xs text-slate-400">Belum ada berita terpopuler.</p>
                            @endforelse
                        </div>

                    </div>
                </div>

            </div>

            {{-- Berita Terkait (Bottom Grid) --}}
            @if ($related->isNotEmpty())
                <div class="mt-14 pt-8 border-t border-slate-200">
                    <h2 class="text-xl font-extrabold text-slate-900 mb-6 flex items-center gap-2">
                        <i class="fas fa-layer-group text-[#00529C] text-lg"></i>
                        <span>Berita Terkait Lainnya</span>
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach ($related as $r)
                            @php
                                $rImgPath = null;
                                if ($r->gambar) {
                                    if (file_exists(public_path('images/news/' . $r->gambar))) {
                                        $rImgPath = asset('images/news/' . $r->gambar);
                                    } elseif (file_exists(public_path('storage/' . $r->gambar))) {
                                        $rImgPath = asset('storage/' . $r->gambar);
                                    } else {
                                        $rImgPath = asset($r->gambar);
                                    }
                                }
                            @endphp
                            <a href="{{ route('news.show', $r->slug ?? $r->id) }}"
                                class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col h-full shadow-xs">
                                <div class="h-40 bg-slate-100 overflow-hidden">
                                    @if ($r->gambar)
                                        <img src="{{ $rImgPath }}" alt="{{ $r->judul }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?auto=format&fit=crop&w=600&q=80';">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?auto=format&fit=crop&w=600&q=80"
                                            alt="{{ $r->judul }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @endif
                                </div>
                                <div class="p-5 flex flex-col flex-1 justify-between">
                                    <div>
                                        <span
                                            class="text-[10px] font-bold text-amber-600 bg-amber-50 px-2.5 py-0.5 rounded-md uppercase mb-2 inline-block">
                                            {{ $r->label_kategori ?? strtoupper($r->kategori) }}
                                        </span>
                                        <h3
                                            class="text-sm font-bold text-slate-800 line-clamp-2 group-hover:text-[#00529C] transition-colors leading-snug">
                                            {{ $r->judul }}
                                        </h3>
                                    </div>
                                    <p class="text-[11px] text-slate-400 mt-4 font-medium">
                                        {{ $r->published_at ? \Carbon\Carbon::parse($r->published_at)->format('d M Y') : \Carbon\Carbon::parse($r->created_at)->format('d M Y') }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>
@endsection
