{{-- HASIL TAB 1: PASANG BARU --}}
<div x-show="tabMode === 'pasang_baru'">
    @if(isset($result))
        <div class="bg-white p-7 rounded-3xl border border-[#1B6EBB]/20 shadow-md space-y-5">
            <h3 class="text-base font-bold text-slate-900">Estimasi Biaya Pasang Baru</h3>

            <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">
                <p class="text-xs text-slate-400 mb-1">Jenis Tarif & Layanan</p>
                <p class="text-lg font-bold text-slate-900">{{ $result['tariff']->nama }}</p>
                @php
                    $nilaiDayaResult = $result['tariff']->daya_va ?? $result['tariff']->daya ?? $result['tariff']->va ?? 0;
                @endphp
                <p class="text-xs text-[#1B6EBB] font-semibold mt-0.5 capitalize">
                    {{ $result['tariff']->kode }} &bull; {{ number_format($nilaiDayaResult) }} VA &bull; <span class="uppercase font-bold">{{ $result['jenis_layanan'] ?? request('jenis_layanan', 'prabayar') }}</span>
                </p>
            </div>

            <div class="space-y-3">
                <div class="flex justify-between items-center py-2 border-b border-slate-100 text-xs sm:text-sm">
                    <span class="text-slate-500">Biaya Pasang Baru (BP)</span>
                    <span class="font-semibold text-slate-900">Rp {{ number_format($result['biaya_pasang'], 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-100 text-xs sm:text-sm">
                    <span class="text-slate-500">Biaya Admin & SLO</span>
                    <span class="font-semibold text-slate-900">Rp {{ number_format($result['biaya_admin'], 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-100 text-xs sm:text-sm">
                    <span class="text-slate-500">
                        {{ ($result['jenis_layanan'] ?? request('jenis_layanan')) === 'pascabayar' ? 'Uang Jaminan Langganan (UJL)' : 'Token Perdana Awal' }}
                    </span>
                    <span class="font-semibold text-slate-900">Rp {{ number_format($result['biaya_layanan_awal'] ?? 50000, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-100 text-xs sm:text-sm">
                    <span class="text-slate-500">PPN (11%)</span>
                    <span class="font-semibold text-slate-900">Rp {{ number_format($result['ppn'], 0, ',', '.') }}</span>
                </div>

                <div class="flex justify-between items-center p-4 bg-[#1B6EBB] text-white rounded-2xl shadow-sm mt-3">
                    <span class="font-medium text-xs sm:text-sm">Total Estimasi</span>
                    <span class="text-lg sm:text-xl font-extrabold text-[#FDB813]">Rp {{ number_format($result['total'], 0, ',', '.') }}</span>
                </div>
            </div>

            <a href="/produk" class="w-full bg-[#FDB813] hover:bg-amber-400 text-[#001230] font-bold text-xs sm:text-sm py-3.5 rounded-xl transition duration-200 flex items-center justify-center gap-2 shadow-md">
                <span>Lanjutkan Permohonan Pasang Baru</span>
                <span class="material-symbols-outlined text-base">arrow_forward</span>
            </a>
        </div>
    @else
        <div class="bg-white p-7 rounded-3xl border border-slate-200/80 shadow-sm flex flex-col items-center justify-center text-center min-h-[380px]">
            <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mb-4 text-slate-400">
                <span class="material-symbols-outlined text-3xl text-slate-400">calculate</span>
            </div>
            <h3 class="font-bold text-slate-700 mb-1">Belum Ada Simulasi</h3>
            <p class="text-slate-400 text-xs max-w-xs leading-relaxed">Pilih jenis tarif & layanan di sebelah kiri lalu klik "Hitung Estimasi Pasang".</p>
        </div>
    @endif
</div>

{{-- HASIL TAB 2: TAMBAH DAYA --}}
<div x-show="tabMode === 'tambah_daya'">
    <div class="bg-white p-7 rounded-3xl border border-[#1B6EBB]/20 shadow-md space-y-5">
        <h3 class="text-base font-bold text-slate-900">Estimasi Tambah Daya</h3>
        <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">
            <p class="text-xs text-slate-400 mb-1">Perubahan Kebutuhan Daya</p>
            <p class="text-base font-bold text-slate-900">
                <span x-text="dayaLama + ' VA'"></span> &rarr; <span class="text-[#1B6EBB]" x-text="dayaBaru + ' VA'"></span>
            </p>
        </div>
        <template x-if="dayaBaru > dayaLama">
            <div class="space-y-3">
                <div class="flex justify-between items-center py-2 border-b border-slate-100 text-xs sm:text-sm">
                    <span class="text-slate-500">Biaya Penyambungan (Selisih)</span>
                    <span class="font-semibold text-slate-900" x-text="formatRupiah((dayaBaru - dayaLama) * 950)"></span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-100 text-xs sm:text-sm">
                    <span class="text-slate-500">Biaya Administrasi</span>
                    <span class="font-semibold text-slate-900">Rp 25.000</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-100 text-xs sm:text-sm">
                    <span class="text-slate-500">PPN (11%)</span>
                    <span class="font-semibold text-slate-900" x-text="formatRupiah(((dayaBaru - dayaLama) * 950 + 25000) * 0.11)"></span>
                </div>
                <div class="flex justify-between items-center p-4 bg-[#1B6EBB] text-white rounded-2xl shadow-sm mt-3">
                    <span class="font-medium text-xs sm:text-sm">Total Estimasi</span>
                    <span class="text-lg sm:text-xl font-extrabold text-[#FDB813]" x-text="formatRupiah(((dayaBaru - dayaLama) * 950 + 25000) * 1.11)"></span>
                </div>
                <a href="/produk" class="w-full bg-[#FDB813] hover:bg-amber-400 text-[#001230] font-bold text-xs sm:text-sm py-3.5 rounded-xl transition duration-200 flex items-center justify-center gap-2 shadow-md block text-center">
                    <span>Lanjutkan Perubahan Daya</span>
                    <span class="material-symbols-outlined text-base">arrow_forward</span>
                </a>
            </div>
        </template>
        <template x-if="dayaBaru <= dayaLama">
            <div class="p-4 bg-amber-50 rounded-xl border border-amber-200 text-center">
                <p class="text-xs text-amber-800 font-medium">Daya baru harus lebih besar dari daya saat ini untuk penambahan daya.</p>
            </div>
        </template>
    </div>
</div>

{{-- HASIL TAB 3: PEMAKAIAN BULANAN --}}
<div x-show="tabMode === 'pemakaian_bulanan'">
    <div class="bg-white p-7 rounded-3xl border border-[#1B6EBB]/20 shadow-md space-y-5">
        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
            <h3 class="text-base font-bold text-slate-900">Estimasi Tagihan Bulanan</h3>
            <span class="px-2.5 py-1 bg-blue-50 text-[#1B6EBB] text-[10px] font-extrabold rounded-full border border-blue-100">Kalkulasi Otomatis</span>
        </div>

        <div class="space-y-3 text-xs sm:text-sm">
            <div class="flex justify-between items-center py-2 border-b border-slate-100">
                <span class="text-slate-500">Total Peralatan Aktif</span>
                <span class="font-bold text-slate-900" x-text="hitungTotalUnit() + ' Unit Peralatan'"></span>
            </div>

            <div class="flex justify-between items-center py-2 border-b border-slate-100">
                <span class="text-slate-500">Estimasi Konsumsi Energi</span>
                <span class="font-bold text-slate-900" x-text="hitungTotalKwh() + ' kWh / Bulan'"></span>
            </div>

            <div class="flex justify-between items-center py-2 border-b border-slate-100">
                <span class="text-slate-500">Tagihan Dasar Listrik</span>
                <span class="font-bold text-slate-900" x-text="formatRupiah(hitungTotalKwh() * tarifKwh)"></span>
            </div>

            <div class="flex justify-between items-center py-2 border-b border-slate-100">
                <span class="text-slate-500">Pajak Penerangan Jalan (PPJ 10%)</span>
                <span class="font-bold text-slate-900" x-text="formatRupiah(hitungTotalKwh() * tarifKwh * 0.10)"></span>
            </div>

            <div class="flex justify-between items-center p-4 bg-[#1B6EBB] text-white rounded-2xl shadow-sm mt-4">
                <div>
                    <span class="font-medium text-xs sm:text-sm block">Perkiraan Biaya / Bulan</span>
                    <span class="text-[10px] text-blue-100 font-normal">Termasuk Energi + Pajak PPJ</span>
                </div>
                <span class="text-xl sm:text-2xl font-black text-[#FDB813]" x-text="formatRupiah(hitungTotalKwh() * tarifKwh * 1.10)"></span>
            </div>
        </div>

        <div class="p-3.5 bg-blue-50/70 rounded-2xl border border-blue-100">
            <p class="text-xs text-[#1B6EBB] leading-relaxed">
                <span class="font-bold">Tips Hemat:</span> Matikan peralatan elektronik yang tidak terpakai atau gunakan teknologi inverter untuk menghemat pengeluaran bulanan.
            </p>
        </div>
    </div>
</div>

{{-- HASIL TAB 4: LISTRIK SEMENTARA --}}
<div x-show="tabMode === 'sementara'">
    <div class="bg-white p-7 rounded-3xl border border-[#1B6EBB]/20 shadow-md space-y-5">
        <h3 class="text-base font-bold text-slate-900">Estimasi Penyambungan Sementara</h3>
        <div class="space-y-3 text-xs sm:text-sm">
            <div class="flex justify-between items-center py-2 border-b border-slate-100">
                <span class="text-slate-500">Biaya Pemasangan Sementara</span>
                <span class="font-semibold text-slate-900" x-text="formatRupiah(dayaSementara * 150)"></span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-slate-100">
                <span class="text-slate-500">Estimasi Pemakaian (<span x-text="durasiHari"></span> Hari)</span>
                <span class="font-semibold text-slate-900" x-text="formatRupiah(durasiHari * 85000)"></span>
            </div>
            <div class="flex justify-between items-center p-4 bg-[#1B6EBB] text-white rounded-2xl shadow-sm mt-3">
                <span class="font-medium text-xs sm:text-sm">Total Estimasi Event</span>
                <span class="text-lg sm:text-xl font-extrabold text-[#FDB813]" x-text="formatRupiah((dayaSementara * 150 + durasiHari * 85000) * 1.11)"></span>
            </div>
        </div>
    </div>
</div>

{{-- HASIL TAB 5: HOME CHARGING EV --}}
<div x-show="tabMode === 'ev_charging'">
    <div class="bg-white p-7 rounded-3xl border border-[#1B6EBB]/20 shadow-md space-y-5">
        <h3 class="text-base font-bold text-slate-900">Estimasi Pasang Home Charger EV</h3>
        <div class="space-y-3 text-xs sm:text-sm">
            <div class="flex justify-between items-center py-2 border-b border-slate-100">
                <span class="text-slate-500">Biaya Pasang Baru EV Charger</span>
                <span class="font-semibold text-slate-900" x-text="formatRupiah(kapasitasEv * 850)"></span>
            </div>
            <div class="flex justify-between items-center py-2 border-b border-slate-100">
                <span class="text-slate-500">Sertifikat Laik Operasi (SLO)</span>
                <span class="font-semibold text-slate-900">Rp 120.000</span>
            </div>
            <div class="flex justify-between items-center p-4 bg-[#1B6EBB] text-white rounded-2xl shadow-sm mt-3">
                <span class="font-medium text-xs sm:text-sm">Total Estimasi EV</span>
                <span class="text-lg sm:text-xl font-extrabold text-[#FDB813]" x-text="formatRupiah((kapasitasEv * 850 + 120000) * 1.11)"></span>
            </div>
        </div>
    </div>
</div>