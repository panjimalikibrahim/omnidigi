<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\News;
use App\Models\PaymentMethod;
use App\Models\Tariff;
use App\Models\Transaction;

class HomeController extends Controller
{
    public function index()
    {
        $tariffs = Tariff::with('category')->take(4)->get();
        
        // Ambil semua berita publik
        $allNews = News::published()->latest('published_at')->get();
        if ($allNews->isEmpty()) {
            $allNews = News::latest()->get(); // Fallback jika status is_published tidak terisi
        }

        // Filter per kategori dengan fallback aman ke $allNews
        $informasiNews   = $allNews->where('kategori', 'informasi')->take(2);
        if ($informasiNews->isEmpty()) {
            $informasiNews = $allNews->take(2);
        }

        $penghargaanNews = $allNews->where('kategori', 'penghargaan')->take(2);
        if ($penghargaanNews->isEmpty()) {
            $penghargaanNews = $allNews->skip(2)->take(2);
            if ($penghargaanNews->isEmpty()) {
                $penghargaanNews = $allNews->take(2);
            }
        }

        $promoNews       = $allNews->where('kategori', 'promo')->take(2);
        if ($promoNews->isEmpty()) {
            $promoNews = $allNews->take(2);
        }

        // Data Statistik Real-Time dari Database
        $totalPelanggan   = Customer::count();
        $totalTransaksi   = Transaction::count();
        $transaksiSukses  = Transaction::where('status', 'success')->count();
        $totalMetodeBayar = PaymentMethod::where('is_active', true)->count();

        $successRate = $totalTransaksi > 0 ? round(($transaksiSukses / $totalTransaksi) * 100, 1) : 99.9;

        $formatK = function ($num, $fallback = '0') {
            if ($num >= 1000000) {
                return round($num / 1000000, 1) . 'M+';
            }
            if ($num >= 1000) {
                return round($num / 1000, 1) . 'K+';
            }
            if ($num > 0) {
                return number_format($num, 0, ',', '.') . ($num >= 50 ? '+' : '');
            }
            return $fallback;
        };

        $stats = [
            [
                'value' => $formatK($totalPelanggan, '1M+'),
                'label' => 'Pelanggan Terdaftar',
            ],
            [
                'value' => $successRate . '%',
                'label' => 'Uptime / Transaksi Sukses',
            ],
            [
                'value' => $formatK($totalTransaksi, '3 Detik'),
                'label' => 'Proses Transaksi',
            ],
            [
                'value' => $totalMetodeBayar > 0 ? $totalMetodeBayar . ' Saluran' : '24/7',
                'label' => 'Dukungan Pembayaran',
            ],
        ];

        return view('home', [
            'tariffs'         => $tariffs,
            'informasiNews'   => $informasiNews,
            'penghargaanNews' => $penghargaanNews,
            'promoNews'       => $promoNews,
            'latestNews'      => $allNews->take(3),
            'stats'           => $stats,
        ]);
    }
}