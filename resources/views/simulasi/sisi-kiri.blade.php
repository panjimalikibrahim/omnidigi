{{-- TAB 1: PASANG BARU --}}
<div x-show="tabMode === 'pasang_baru'" class="space-y-5">
    <div class="flex items-center justify-between pb-3 border-b border-slate-100">
        <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider flex items-center gap-2">
            <span class="w-6 h-6 rounded-lg bg-blue-50 text-[#1B6EBB] flex items-center justify-center text-xs font-extrabold">1</span>
            Pilih Jenis Tarif
        </h3>
        <span class="text-[11px] font-medium text-slate-400">Pilih salah satu</span>
    </div>

    <form action="{{ route('simulasi.hitung') }}#kalkulator-simulasi" method="POST">
        @csrf
        <div class="space-y-3 max-h-[360px] overflow-y-auto pr-1 chat-scroll">
            @foreach($tariffs as $tariff)
                @php
                    $nilaiDaya = $tariff->daya_va ?? $tariff->daya ?? $tariff->va ?? 0;
                @endphp
                <label class="flex items-center gap-3.5 p-3.5 rounded-2xl border cursor-pointer transition-all duration-200
                    {{ isset($result) && $result['tariff']->id === $tariff->id
                        ? 'border-[#1B6EBB] bg-[#1B6EBB]/5 ring-2 ring-[#1B6EBB]/20 shadow-sm'
                        : 'border-slate-200 hover:border-slate-300 hover:bg-slate-50' }}">
                    
                    <input type="radio" name="tariff_id" value="{{ $tariff->id }}"
                           class="w-4 h-4 text-[#1B6EBB] border-slate-300 focus:ring-[#1B6EBB]"
                           {{ (isset($result) && $result['tariff']->id === $tariff->id) || $loop->first ? 'checked' : '' }}
                           required>
                    
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-xs sm:text-sm text-slate-900">{{ $tariff->nama }}</p>
                        <p class="text-xs text-slate-400 mt-0.5">{{ $tariff->kode }}</p>
                    </div>
                    
                    <span class="text-xs font-bold text-[#1B6EBB] bg-[#1B6EBB]/10 px-3 py-1 rounded-full flex-shrink-0">
                        {{ $nilaiDaya > 0 ? number_format($nilaiDaya) . ' VA' : $tariff->kode }}
                    </span>
                </label>
            @endforeach
        </div>

        {{-- Metode Layanan --}}
        <div class="mt-6 pt-5 border-t border-slate-100">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-800 uppercase tracking-wider">Metode Layanan Listrik</span>
                <span class="text-[10px] text-slate-400 font-medium">Sistem Meteran</span>
            </div>
            
            <div class="grid grid-cols-2 gap-3.5">
                <label class="group relative flex items-center p-3.5 rounded-2xl border border-slate-200 cursor-pointer transition-all duration-200 hover:border-[#1B6EBB]/60 hover:bg-slate-50/80 has-[:checked]:border-[#1B6EBB] has-[:checked]:bg-blue-50/70 has-[:checked]:ring-2 has-[:checked]:ring-[#1B6EBB]/20 has-[:checked]:shadow-sm">
                    <input type="radio" name="jenis_layanan" value="prabayar" class="sr-only" 
                           {{ old('jenis_layanan', request('jenis_layanan', 'prabayar')) == 'prabayar' ? 'checked' : '' }}>
                    <div class="flex items-center gap-3 w-full">
                        <div class="w-9 h-9 rounded-xl bg-slate-100 text-slate-500 group-hover:text-[#1B6EBB] group-has-[:checked]:bg-[#1B6EBB] group-has-[:checked]:text-white flex items-center justify-center transition-colors flex-shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-lg">bolt</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-bold text-slate-800 leading-tight group-has-[:checked]:text-[#1B6EBB]">Prabayar</p>
                            <p class="text-[10px] text-slate-400 mt-0.5 font-medium">Sistem Token/Pulsa</p>
                        </div>
                    </div>
                </label>

                <label class="group relative flex items-center p-3.5 rounded-2xl border border-slate-200 cursor-pointer transition-all duration-200 hover:border-[#1B6EBB]/60 hover:bg-slate-50/80 has-[:checked]:border-[#1B6EBB] has-[:checked]:bg-blue-50/70 has-[:checked]:ring-2 has-[:checked]:ring-[#1B6EBB]/20 has-[:checked]:shadow-sm">
                    <input type="radio" name="jenis_layanan" value="pascabayar" class="sr-only"
                           {{ old('jenis_layanan', request('jenis_layanan')) == 'pascabayar' ? 'checked' : '' }}>
                    <div class="flex items-center gap-3 w-full">
                        <div class="w-9 h-9 rounded-xl bg-slate-100 text-slate-500 group-hover:text-[#1B6EBB] group-has-[:checked]:bg-[#1B6EBB] group-has-[:checked]:text-white flex items-center justify-center transition-colors flex-shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-lg">receipt_long</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-bold text-slate-800 leading-tight group-has-[:checked]:text-[#1B6EBB]">Pascabayar</p>
                            <p class="text-[10px] text-slate-400 mt-0.5 font-medium">Bayar Akhir Bulan</p>
                        </div>
                    </div>
                </label>
            </div>
        </div>

        <button type="submit" class="w-full mt-6 bg-[#1B6EBB] hover:bg-[#145897] text-white font-bold text-xs sm:text-sm py-3.5 rounded-xl transition duration-200 flex items-center justify-center gap-2 shadow-md">
            <span class="material-symbols-outlined text-base">calculate</span>
            <span>Hitung Estimasi Pasang</span>
        </button>
    </form>
</div>

{{-- TAB 2: TAMBAH DAYA --}}
<div x-show="tabMode === 'tambah_daya'" class="space-y-4">
    <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider pb-3 border-b border-slate-100 flex items-center gap-2">
        <span class="w-6 h-6 rounded-lg bg-blue-50 text-[#1B6EBB] flex items-center justify-center text-xs font-extrabold">1</span>
        Simulasi Tambah Daya
    </h3>

    <div class="space-y-3">
        <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Daya Saat Ini (Lama)</label>
            <select x-model.number="dayaLama" class="w-full p-3 text-xs sm:text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-[#1B6EBB] bg-slate-50 font-medium">
                <option value="450">450 VA</option>
                <option value="900">900 VA</option>
                <option value="1300">1300 VA</option>
                <option value="2200">2200 VA</option>
            </select>
        </div>

        <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Daya Yang Diinginkan (Baru)</label>
            <select x-model.number="dayaBaru" class="w-full p-3 text-xs sm:text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-[#1B6EBB] bg-slate-50 font-medium">
                <option value="900">900 VA</option>
                <option value="1300">1300 VA</option>
                <option value="2200">2200 VA</option>
                <option value="3500">3500 VA</option>
                <option value="5500">5500 VA</option>
            </select>
        </div>
    </div>
</div>

{{-- TAB 3: PEMAKAIAN BULANAN (20 ALAT) --}}
<div x-show="tabMode === 'pemakaian_bulanan'" class="space-y-4">
    <div class="flex items-center justify-between pb-3 border-b border-slate-100">
        <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider flex items-center gap-2">
            <span class="w-6 h-6 rounded-lg bg-blue-50 text-[#1B6EBB] flex items-center justify-center text-xs font-extrabold">1</span>
            Simulasi Peralatan Elektronik
        </h3>
        <span class="text-[11px] font-medium text-slate-400">20 Pilihan Perangkat</span>
    </div>

    <div>
        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Golongan Daya Listrik Rumah</label>
        <select x-model.number="tarifKwh" class="w-full p-3 text-xs border border-slate-200 rounded-xl bg-slate-50 font-semibold text-slate-800 focus:ring-2 focus:ring-[#1B6EBB]">
            <option value="1352">R1 - 900 VA (Rp 1.352 / kWh)</option>
            <option value="1444">R1 - 1.300 VA s/d 2.200 VA (Rp 1.444 / kWh)</option>
            <option value="1700">R2/R3 - 3.500 VA ke atas (Rp 1.700 / kWh)</option>
        </select>
    </div>

    <div class="space-y-3 max-h-[380px] overflow-y-auto pr-1 chat-scroll">
        <template x-for="(alat, index) in daftarAlat" :key="index">
            <div class="p-3.5 bg-slate-50 rounded-2xl border border-slate-200/80 space-y-2.5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-blue-100/70 text-[#1B6EBB] flex items-center justify-center">
                            <span class="material-symbols-outlined text-base" x-text="alat.icon"></span>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-800" x-text="alat.nama"></p>
                            <p class="text-[10px] text-slate-400" x-text="'Daya: ' + alat.watt + ' Watt'"></p>
                        </div>
                    </div>
                    <div class="flex items-center gap-1.5 bg-white border border-slate-200 px-2 py-1 rounded-xl">
                        <span class="text-[10px] font-medium text-slate-400">Unit:</span>
                        <input type="number" min="0" max="20" x-model.number="alat.unit" class="w-8 text-center text-xs font-bold text-slate-800 focus:outline-none">
                    </div>
                </div>
                <div class="flex items-center justify-between pt-1 border-t border-slate-200/60 text-[11px]">
                    <span class="text-slate-500 font-medium">Jam Pakai / Hari:</span>
                    <div class="flex items-center gap-2">
                        <input type="range" min="0" max="24" x-model.number="alat.jam" class="w-24 sm:w-32 accent-[#1B6EBB]">
                        <span class="w-12 text-right font-bold text-[#1B6EBB]" x-text="alat.jam + ' Jam'"></span>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>

{{-- TAB 4: LISTRIK SEMENTARA --}}
<div x-show="tabMode === 'sementara'" class="space-y-4">
    <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider pb-3 border-b border-slate-100 flex items-center gap-2">
        <span class="w-6 h-6 rounded-lg bg-blue-50 text-[#1B6EBB] flex items-center justify-center text-xs font-extrabold">1</span>
        Kebutuhan Acara / Pesta
    </h3>

    <div class="space-y-3">
        <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Pilihan Daya Sementara</label>
            <select x-model.number="dayaSementara" class="w-full p-3 text-xs sm:text-sm border border-slate-200 rounded-xl bg-slate-50 font-medium focus:ring-2 focus:ring-[#1B6EBB]">
                <option value="2200">2.200 VA - Acara Kecil / Syukuran</option>
                <option value="3500">3.500 VA - Acara Sedang</option>
                <option value="5500">5.500 VA - Pesta Pernikahan Rumahan</option>
                <option value="11000">11.000 VA - Panggung Acara Lokal</option>
                <option value="22000">22.000 VA - Pameran & Panggung Medium</option>
                <option value="33000">33.000 VA - Festival / Konser Terbuka</option>
                <option value="66000">66.000 VA - Event Skala Besar</option>
                <option value="100000">100.000 VA - Power Bank PLN / Industri</option>
            </select>
        </div>

        <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Lama Durasi Pemakaian (Hari)</label>
            <input type="number" min="1" max="30" x-model.number="durasiHari" class="w-full p-3 text-xs sm:text-sm border border-slate-200 rounded-xl bg-slate-50 font-medium focus:ring-2 focus:ring-[#1B6EBB]">
        </div>
    </div>
</div>

{{-- TAB 5: HOME CHARGING EV --}}
<div x-show="tabMode === 'ev_charging'" class="space-y-4">
    <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider pb-3 border-b border-slate-100 flex items-center gap-2">
        <span class="w-6 h-6 rounded-lg bg-blue-50 text-[#1B6EBB] flex items-center justify-center text-xs font-extrabold">1</span>
        Pasang Home Charger Kendaraan Listrik
    </h3>

    <div class="space-y-3">
        <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Kapasitas Charger Kendaraan Listrik</label>
            <select x-model.number="kapasitasEv" class="w-full p-3 text-xs sm:text-sm border border-slate-200 rounded-xl bg-slate-50 font-medium focus:ring-2 focus:ring-[#1B6EBB] focus:outline-none">
                <option value="3500">3.500 VA (Motor Listrik / Mini EV)</option>
                <option value="7400">7.400 VA (Home Charger 1 Fasa - Standar)</option>
                <option value="11000">11.000 VA (Home Charger 3 Fasa - Menengah)</option>
                <option value="16500">16.500 VA (Home Charger 3 Fasa - Tinggi)</option>
                <option value="22000">22.000 VA (Fast Home Charger - Premium)</option>
                <option value="41500">41.500 VA (Ultra Fast Mini Commercial)</option>
            </select>
        </div>
        <div class="p-3 bg-emerald-50 rounded-xl border border-emerald-200">
            <p class="text-[11px] text-emerald-800 leading-relaxed font-medium">
                Diskon tarif 30% untuk pengisian daya kendaraan listrik pada pukul 22.00 - 05.00 WIB.
            </p>
        </div>
    </div>
</div>