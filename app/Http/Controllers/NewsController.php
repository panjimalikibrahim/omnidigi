<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Tampilan daftar berita publik (dengan filter kategori & paginasi)
     */
    public function index(Request $request)
    {
        // Kueri dasar: Ambil hanya berita yang dipublikasikan dan urutkan dari yang terbaru
        $query = News::query();

        if (method_exists(News::class, 'scopePublished')) {
            $query->published();
        } else {
            $query->where('is_published', true);
        }

        $query->orderBy('published_at', 'desc');

        // Filter berdasarkan kategori dari URL
        if ($request->filled('kategori') && strtolower($request->kategori) !== 'semua') {
            $kat = strtolower($request->kategori);

            // Memetakan nilai URL ke enum database yang sesuai
            if ($kat === 'informasi') {
                $kat = 'info';
            }

            if (method_exists(News::class, 'scopeByKategori')) {
                $query->byKategori($kat);
            } else {
                // Menggunakan pencocokan nilai persis (exact match) agar enum SQLite terbaca sempurna
                $query->where('kategori', $kat);
            }
        }

        // Ambil 12 data per halaman dan sertakan query string URL agar filter tidak lepas
        $news = $query->paginate(12)->appends($request->query());
        $activeKategori = $request->input('kategori', 'semua');

        return view('news.index', compact('news', 'activeKategori'));
    }

    /**
     * Tampilan detail berita (dengan Sidebar Terpopuler ala Portal BUMN)
     */
    public function show(string $slug)
    {
        // Cari berita berdasarkan slug atau ID
        $article = News::where(function ($q) use ($slug) {
                $q->where('slug', $slug)->orWhere('id', $slug);
            })
            ->where('is_published', true)
            ->firstOrFail();

        // Ambil 3 berita terkait dalam kategori yang sama
        $related = News::where('id', '!=', $article->id)
            ->where('kategori', $article->kategori)
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Ambil 5 berita terpopuler/terbaru untuk sidebar ala BUMN
        $popularNews = News::where('id', '!=', $article->id)
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        return view('news.show', compact('article', 'related', 'popularNews'));
    }
}