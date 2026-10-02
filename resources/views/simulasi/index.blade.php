@extends('layouts.main')
@section('title', 'Simulasi Kelistrikan Lengkap - PLN DIGI')

@section('content')
{{-- Header Hero Section Simulasi (Style Produk) --}}
<section class="relative bg-gradient-to-br from-[#001230] via-[#00265a] to-[#001a4d] text-white overflow-hidden">
    <div class="absolute inset-0 bg-[url('/images/hero-pln-1.jpg')] bg-cover bg-center opacity-15"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-16 md:pt-16 md:pb-20">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-white/10 backdrop-blur-md rounded-full text-amber-400 text-xs font-extrabold uppercase tracking-wider mb-4 border border-white/10 shadow-sm">
            <span>⚡ SIMULASI BIAYA</span>
        </div>
        <h1 class="text-3xl md:text-5xl font-black tracking-tight leading-tight max-w-3xl">
            Simulasi Kelistrikan <span class="text-amber-400">Digital</span>
        </h1>
        <p class="text-white/80 mt-3 max-w-xl text-sm md:text-base leading-relaxed font-normal">
            Pilih jenis simulasi kelistrikan sesuai kebutuhan Anda untuk menghitung estimasi biaya secara akurat.
        </p>
    </div>
</section>

{{-- Section Kalkulator Utama --}}
<section id="kalkulator-simulasi" class="py-12 md:py-16 bg-slate-50 scroll-mt-20" x-data="simulasiLengkap()">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- 5 TAB NAVIGASI SIMULASI (RESPONSIF & RATA TENGAH) --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 md:flex md:items-center md:justify-center gap-2 mb-8 bg-slate-200/70 p-1.5 rounded-2xl border border-slate-300/60 max-w-4xl mx-auto">
            <button type="button" @click="tabMode = 'pasang_baru'" 
                    :class="tabMode === 'pasang_baru' ? 'bg-[#1B6EBB] text-white shadow-md font-bold' : 'text-slate-600 hover:text-slate-900 font-medium'"
                    class="py-3 px-4 text-xs rounded-xl transition-all duration-200 flex items-center justify-center gap-1.5 flex-1 whitespace-nowrap">
                <span class="material-symbols-outlined text-sm">add_circle</span>
                <span>Pasang Baru</span>
            </button>

            <button type="button" @click="tabMode = 'tambah_daya'" 
                    :class="tabMode === 'tambah_daya' ? 'bg-[#1B6EBB] text-white shadow-md font-bold' : 'text-slate-600 hover:text-slate-900 font-medium'"
                    class="py-3 px-4 text-xs rounded-xl transition-all duration-200 flex items-center justify-center gap-1.5 flex-1 whitespace-nowrap">
                <span class="material-symbols-outlined text-sm">upgrade</span>
                <span>Tambah Daya</span>
            </button>

            <button type="button" @click="tabMode = 'pemakaian_bulanan'" 
                    :class="tabMode === 'pemakaian_bulanan' ? 'bg-[#1B6EBB] text-white shadow-md font-bold' : 'text-slate-600 hover:text-slate-900 font-medium'"
                    class="py-3 px-4 text-xs rounded-xl transition-all duration-200 flex items-center justify-center gap-1.5 flex-1 whitespace-nowrap">
                <span class="material-symbols-outlined text-sm">devices</span>
                <span>Pemakaian Bulanan</span>
            </button>

            <button type="button" @click="tabMode = 'sementara'" 
                    :class="tabMode === 'sementara' ? 'bg-[#1B6EBB] text-white shadow-md font-bold' : 'text-slate-600 hover:text-slate-900 font-medium'"
                    class="py-3 px-4 text-xs rounded-xl transition-all duration-200 flex items-center justify-center gap-1.5 flex-1 whitespace-nowrap">
                <span class="material-symbols-outlined text-sm">event</span>
                <span>Listrik Sementara</span>
            </button>

            <button type="button" @click="tabMode = 'ev_charging'" 
                    :class="tabMode === 'ev_charging' ? 'bg-[#1B6EBB] text-white shadow-md font-bold' : 'text-slate-600 hover:text-slate-900 font-medium'"
                    class="py-3 px-4 text-xs rounded-xl transition-all duration-200 flex items-center justify-center gap-1.5 flex-1 whitespace-nowrap col-span-2 sm:col-span-1">
                <span class="material-symbols-outlined text-sm">ev_station</span>
                <span>Home Charging EV</span>
            </button>
        </div>

        <div class="grid md:grid-cols-12 gap-8 items-start">
            
            {{-- SISI KIRI (FORM INPUT) --}}
            <div class="md:col-span-6 bg-white p-6 sm:p-7 rounded-3xl border border-slate-200/80 shadow-sm space-y-6">
                @include('simulasi.sisi-kiri')
            </div>

            {{-- SISI KANAN (HASIL SIMULASI) --}}
            <div class="md:col-span-6">
                @include('simulasi.sisi-kanan')
            </div>

        </div>
    </div>
</section>

{{-- SCRIPT ALPINE JS --}}
<script>
function simulasiLengkap() {
    return {
        tabMode: 'pasang_baru',
        dayaLama: 900,
        dayaBaru: 2200,
        tarifKwh: 1444,
        dayaSementara: 3500,
        durasiHari: 3,
        kapasitasEv: 7400,
        
        daftarAlat: [
            { nama: 'AC 1 PK (Living Room/Kamar Utama)', watt: 750, jam: 8, unit: 1, icon: 'ac_unit' },
            { nama: 'AC 1/2 PK (Kamar Tidur)', watt: 350, jam: 8, unit: 1, icon: 'mode_cool' },
            { nama: 'Kulkas 2 Pintu', watt: 150, jam: 24, unit: 1, icon: 'kitchen' },
            { nama: 'Freezer / Showcase Es', watt: 200, jam: 24, unit: 0, icon: 'severe_cold' },
            { nama: 'Lampu LED Utama', watt: 10, jam: 12, unit: 10, icon: 'lightbulb' },
            { nama: 'TV Smart / LED Display', watt: 100, jam: 6, unit: 1, icon: 'tv' },
            { nama: 'Set Top Box / Receiver TV', watt: 15, jam: 6, unit: 1, icon: 'settings_remote' },
            { nama: 'Mesin Cuci Bukaan Depan/Atas', watt: 350, jam: 2, unit: 1, icon: 'local_laundry_service' },
            { nama: 'Pengering Pakaian (Clothes Dryer)', watt: 1200, jam: 1, unit: 0, icon: 'dry' },
            { nama: 'Magic Com / Rice Cooker', watt: 350, jam: 4, unit: 1, icon: 'rice_bowl' },
            { nama: 'Dispenser Air (Panas & Dingin)', watt: 350, jam: 8, unit: 1, icon: 'water_drop' },
            { nama: 'Pompa Air Otomatis', watt: 250, jam: 2, unit: 1, icon: 'mode_fan' },
            { nama: 'Setrika Listrik', watt: 300, jam: 1, unit: 1, icon: 'iron' },
            { nama: 'Microwave / Oven Listrik', watt: 800, jam: 1, unit: 0, icon: 'microwave' },
            { nama: 'Air Fryer / Penggorengan Tanpa Minyak', watt: 1000, jam: 1, unit: 0, icon: 'skillet' },
            { nama: 'Kipas Angin Dinding / Berdiri', watt: 50, jam: 10, unit: 2, icon: 'fan' },
            { nama: 'PC / Komputer Desktop / Gaming', watt: 300, jam: 5, unit: 0, icon: 'desktop_windows' },
            { nama: 'Router Wi-Fi Modem 24 Jam', watt: 12, jam: 24, unit: 1, icon: 'router' },
            { nama: 'Water Heater (Pemanas Air Kamar Mandi)', watt: 800, jam: 1, unit: 0, icon: 'shower' },
            { nama: 'Vacuum Cleaner (Penyedot Debu)', watt: 400, jam: 1, unit: 0, icon: 'vacuum' }
        ],

        hitungTotalUnit() {
            return this.daftarAlat.reduce((sum, item) => sum + (item.unit || 0), 0);
        },

        hitungTotalKwh() {
            let totalKwhHarian = 0;
            this.daftarAlat.forEach(item => {
                if (item.unit > 0 && item.jam > 0) {
                    totalKwhHarian += (item.watt * item.jam * item.unit) / 1000;
                }
            });
            return Math.round(totalKwhHarian * 30);
        },

        formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(angka);
        }
    }
}
</script>
@endsection