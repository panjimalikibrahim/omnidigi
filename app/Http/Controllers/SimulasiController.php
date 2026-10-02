<?php

namespace App\Http\Controllers;

use App\Models\Tariff;
use Illuminate\Http\Request;

class SimulasiController extends Controller
{
    public function index()
    {
        $tariffs = Tariff::with('category')->orderBy('daya_va')->get();
        return view('simulasi.index', compact('tariffs'));
    }

    public function hitung(Request $request)
    {
        $request->validate([
            'tariff_id'     => 'required|exists:tariffs,id',
            'jenis_layanan' => 'nullable|in:prabayar,pascabayar',
        ]);

        $tariff = Tariff::findOrFail($request->tariff_id);
        $jenisLayanan = $request->input('jenis_layanan', 'prabayar');

        $biayaPasang = $tariff->biaya_pasang ?? 0;
        $biayaAdmin  = $tariff->biaya_admin ?? 0;

        if ($jenisLayanan === 'pascabayar') {
            $biayaLayananAwal = 85000; // Uang Jaminan Langganan (UJL)
        } else {
            $biayaLayananAwal = 50000; // Token Perdana Awal
        }

        $subtotal = $biayaPasang + $biayaAdmin + $biayaLayananAwal;
        $ppn      = round($subtotal * 0.11, 2);
        $total    = round($subtotal + $ppn, 2);

        $result = [
            'tariff'             => $tariff,
            'jenis_layanan'      => $jenisLayanan,
            'biaya_pasang'       => $biayaPasang,
            'biaya_admin'        => $biayaAdmin,
            'biaya_layanan_awal' => $biayaLayananAwal,
            'ppn'                => $ppn,
            'total'              => $total,
        ];

        $tariffs = Tariff::with('category')->orderBy('daya_va')->get();

        return view('simulasi.index', compact('tariffs', 'result'));
    }
}