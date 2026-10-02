<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\MeterReading;
use App\Models\OutageReport;
use App\Models\PaymentMethod;
use App\Models\Tariff;
use App\Models\TariffCategory;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ─── 1. USERS ───────────────────────────────────────────────────────────
        $admin = User::create([
            'name'     => 'Admin PLN',
            'email'    => 'admin@plndigi.com',
            'password' => bcrypt('password'),
            'role'     => 'admin',
        ]);

        $user = User::create([
            'name'     => 'Panji Malik',
            'email'    => 'panji@mail.com',
            'password' => bcrypt('password'),
            'role'     => 'user',
        ]);

        // ─── 2. TARIFF CATEGORIES ───────────────────────────────────────────────
        $catR = TariffCategory::create(['kode' => 'R', 'nama' => 'Rumah Tangga',  'deskripsi' => 'Tarif untuk keperluan rumah tangga']);
        $catB = TariffCategory::create(['kode' => 'B', 'nama' => 'Bisnis',        'deskripsi' => 'Tarif untuk keperluan bisnis dan komersial']);
        $catI = TariffCategory::create(['kode' => 'I', 'nama' => 'Industri',      'deskripsi' => 'Tarif untuk keperluan industri besar']);
        $catS = TariffCategory::create(['kode' => 'S', 'nama' => 'Sosial',        'deskripsi' => 'Tarif untuk keperluan sosial (sekolah, rumah sakit, dll)']);

        // ─── 3. TARIFFS ─────────────────────────────────────────────────────────
        $tariffs = [
            ['tariff_category_id' => $catR->id, 'kode' => 'R1-450',  'nama' => 'Rumah Tangga 450VA',  'daya_va' => 450,  'harga_per_kwh' => 415,   'biaya_beban' => 11000,  'biaya_pasang' => 385000,  'biaya_admin' => 50000,  'is_subsidi' => true],
            ['tariff_category_id' => $catR->id, 'kode' => 'R1-900',  'nama' => 'Rumah Tangga 900VA',  'daya_va' => 900,  'harga_per_kwh' => 605,   'biaya_beban' => 20000,  'biaya_pasang' => 590000,  'biaya_admin' => 50000,  'is_subsidi' => true],
            ['tariff_category_id' => $catR->id, 'kode' => 'R1-1300', 'nama' => 'Rumah Tangga 1300VA', 'daya_va' => 1300, 'harga_per_kwh' => 1444.7,'biaya_beban' => 40500,  'biaya_pasang' => 960000,  'biaya_admin' => 75000,  'is_subsidi' => false],
            ['tariff_category_id' => $catR->id, 'kode' => 'R1-2200', 'nama' => 'Rumah Tangga 2200VA', 'daya_va' => 2200, 'harga_per_kwh' => 1444.7,'biaya_beban' => 67500,  'biaya_pasang' => 1500000, 'biaya_admin' => 75000,  'is_subsidi' => false],
            ['tariff_category_id' => $catR->id, 'kode' => 'R2-3500', 'nama' => 'Rumah Tangga 3500VA', 'daya_va' => 3500, 'harga_per_kwh' => 1699.53,'biaya_beban' => 105000, 'biaya_pasang' => 2500000, 'biaya_admin' => 100000, 'is_subsidi' => false],
            ['tariff_category_id' => $catR->id, 'kode' => 'R3-6600', 'nama' => 'Rumah Tangga 6600VA', 'daya_va' => 6600, 'harga_per_kwh' => 1699.53,'biaya_beban' => 189000, 'biaya_pasang' => 4500000, 'biaya_admin' => 100000, 'is_subsidi' => false],
            ['tariff_category_id' => $catB->id, 'kode' => 'B1-6600', 'nama' => 'Bisnis 6600VA',       'daya_va' => 6600, 'harga_per_kwh' => 1444.7,'biaya_beban' => 189000, 'biaya_pasang' => 4200000, 'biaya_admin' => 150000, 'is_subsidi' => false],
            ['tariff_category_id' => $catB->id, 'kode' => 'B2-10K',  'nama' => 'Bisnis 10.600VA',     'daya_va' => 10600,'harga_per_kwh' => 1699.53,'biaya_beban' => 304200, 'biaya_pasang' => 6500000, 'biaya_admin' => 150000, 'is_subsidi' => false],
            ['tariff_category_id' => $catS->id, 'kode' => 'S2-900',  'nama' => 'Sosial 900VA',        'daya_va' => 900,  'harga_per_kwh' => 605,   'biaya_beban' => 18000,  'biaya_pasang' => 590000,  'biaya_admin' => 50000,  'is_subsidi' => true],
        ];

        $tariffModels = [];
        foreach ($tariffs as $t) {
            $tariffModels[$t['kode']] = Tariff::create($t);
        }

        // ─── 4. PAYMENT METHODS ─────────────────────────────────────────────────
        $methods = [
            ['kode' => 'qris',     'nama' => 'QRIS',           'icon' => 'qris',     'is_active' => true],
            ['kode' => 'gopay',    'nama' => 'GoPay',          'icon' => 'gopay',    'is_active' => true],
            ['kode' => 'ovo',      'nama' => 'OVO',            'icon' => 'ovo',      'is_active' => true],
            ['kode' => 'dana',     'nama' => 'DANA',           'icon' => 'dana',     'is_active' => true],
            ['kode' => 'bca',      'nama' => 'Transfer BCA',   'icon' => 'bca',      'is_active' => true],
            ['kode' => 'mandiri',  'nama' => 'Transfer Mandiri','icon' => 'mandiri', 'is_active' => true],
            ['kode' => 'bni',      'nama' => 'Transfer BNI',   'icon' => 'bni',      'is_active' => true],
            ['kode' => 'cash',     'nama' => 'Tunai',          'icon' => 'cash',     'is_active' => false],
        ];

        $payMethods = [];
        foreach ($methods as $m) {
            $payMethods[$m['kode']] = PaymentMethod::create($m);
        }

        // ─── 5. CUSTOMERS ────────────────────────────────────────────────────────
        $customersData = [
            ['user_id' => $user->id, 'tariff_id' => $tariffModels['R1-1300']->id, 'id_pelanggan' => '531200012345', 'nama' => 'Panji Malik',    'alamat' => 'Jl. Merdeka No. 10, Jakarta Pusat',     'nomor_telepon' => '081234567890', 'email' => 'panji@mail.com'],
            ['user_id' => null,      'tariff_id' => $tariffModels['R1-2200']->id, 'id_pelanggan' => '531200026789', 'nama' => 'Budi Santoso',    'alamat' => 'Jl. Sudirman No. 25, Bandung',          'nomor_telepon' => '082345678901', 'email' => null],
            ['user_id' => null,      'tariff_id' => $tariffModels['R1-900']->id,  'id_pelanggan' => '531200031122', 'nama' => 'Siti Rahayu',     'alamat' => 'Jl. Gatot Subroto No. 5, Surabaya',    'nomor_telepon' => '083456789012', 'email' => null],
            ['user_id' => null,      'tariff_id' => $tariffModels['B1-6600']->id, 'id_pelanggan' => '531200043344', 'nama' => 'Ahmad Fauzi',     'alamat' => 'Jl. Diponegoro No. 15, Semarang',      'nomor_telepon' => '084567890123', 'email' => 'ahmad@bisnis.com'],
            ['user_id' => null,      'tariff_id' => $tariffModels['R1-1300']->id, 'id_pelanggan' => '531200055566', 'nama' => 'Dewi Lestari',    'alamat' => 'Jl. Ahmad Yani No. 30, Medan',         'nomor_telepon' => '085678901234', 'email' => null],
            ['user_id' => null,      'tariff_id' => $tariffModels['R1-450']->id,  'id_pelanggan' => '531200066677', 'nama' => 'Rizky Pratama',   'alamat' => 'Jl. Pahlawan No. 8, Yogyakarta',       'nomor_telepon' => '086789012345', 'email' => null],
            ['user_id' => null,      'tariff_id' => $tariffModels['R2-3500']->id, 'id_pelanggan' => '531200077788', 'nama' => 'Anita Susanti',   'alamat' => 'Jl. Pemuda No. 50, Makassar',          'nomor_telepon' => '087890123456', 'email' => null],
            ['user_id' => null,      'tariff_id' => $tariffModels['S2-900']->id,  'id_pelanggan' => '531200088899', 'nama' => 'SDN Merdeka 01',  'alamat' => 'Jl. Pendidikan No. 1, Bandung',        'nomor_telepon' => '088901234567', 'email' => 'sdn.merdeka@mail.com'],
        ];

        $customerModels = [];
        foreach ($customersData as $c) {
            $customerModels[] = Customer::create($c);
        }

        // ─── 6. METER READINGS ──────────────────────────────────────────────────
        $now = now();
        $meterData = [
            ['customer_id' => $customerModels[0]->id, 'bulan' => $now->copy()->subMonths(2)->month, 'tahun' => $now->copy()->subMonths(2)->year, 'meteran_awal' => 1250, 'meteran_akhir' => 1447, 'status' => 'billed'],
            ['customer_id' => $customerModels[0]->id, 'bulan' => $now->copy()->subMonth()->month,   'tahun' => $now->copy()->subMonth()->year,   'meteran_awal' => 1447, 'meteran_akhir' => 1645, 'status' => 'billed'],
            ['customer_id' => $customerModels[0]->id, 'bulan' => $now->month,                       'tahun' => $now->year,                       'meteran_awal' => 1645, 'meteran_akhir' => 1843, 'status' => 'billed'],
            ['customer_id' => $customerModels[1]->id, 'bulan' => $now->copy()->subMonth()->month,   'tahun' => $now->copy()->subMonth()->year,   'meteran_awal' => 3200, 'meteran_akhir' => 3512, 'status' => 'billed'],
            ['customer_id' => $customerModels[1]->id, 'bulan' => $now->month,                       'tahun' => $now->year,                       'meteran_awal' => 3512, 'meteran_akhir' => 3820, 'status' => 'verified'],
            ['customer_id' => $customerModels[2]->id, 'bulan' => $now->copy()->subMonth()->month,   'tahun' => $now->copy()->subMonth()->year,   'meteran_awal' => 890,  'meteran_akhir' => 1022, 'status' => 'billed'],
            ['customer_id' => $customerModels[2]->id, 'bulan' => $now->month,                       'tahun' => $now->year,                       'meteran_awal' => 1022, 'meteran_akhir' => 1150, 'status' => 'verified'],
            ['customer_id' => $customerModels[3]->id, 'bulan' => $now->copy()->subMonth()->month,   'tahun' => $now->copy()->subMonth()->year,   'meteran_awal' => 7800, 'meteran_akhir' => 8350, 'status' => 'billed'],
            ['customer_id' => $customerModels[3]->id, 'bulan' => $now->month,                       'tahun' => $now->year,                       'meteran_awal' => 8350, 'meteran_akhir' => 8900, 'status' => 'verified'],
            ['customer_id' => $customerModels[4]->id, 'bulan' => $now->month,                       'tahun' => $now->year,                       'meteran_awal' => 2100, 'meteran_akhir' => 2320, 'status' => 'verified'],
        ];

        $meterModels = [];
        foreach ($meterData as $m) {
            $meterModels[] = MeterReading::create($m);
        }

        // ─── 7. BILLS ────────────────────────────────────────────────────────────
        $billsData = [
            ['customer_id' => $customerModels[0]->id, 'meter_reading_id' => $meterModels[0]->id, 'bulan' => $meterModels[0]->bulan, 'tahun' => $meterModels[0]->tahun, 'total_kwh' => 197, 'total_biaya' => 284606.9, 'denda' => 0, 'status' => 'paid', 'tanggal_jatuh_tempo' => $now->copy()->subMonths(2)->endOfMonth()->toDateString(), 'tanggal_bayar' => $now->copy()->subMonths(2)->subDays(5)->toDateString()],
            ['customer_id' => $customerModels[0]->id, 'meter_reading_id' => $meterModels[1]->id, 'bulan' => $meterModels[1]->bulan, 'tahun' => $meterModels[1]->tahun, 'total_kwh' => 198, 'total_biaya' => 286050.6, 'denda' => 0, 'status' => 'unpaid', 'tanggal_jatuh_tempo' => $now->copy()->subMonth()->endOfMonth()->toDateString(), 'tanggal_bayar' => null],
            ['customer_id' => $customerModels[0]->id, 'meter_reading_id' => $meterModels[2]->id, 'bulan' => $meterModels[2]->bulan, 'tahun' => $meterModels[2]->tahun, 'total_kwh' => 198, 'total_biaya' => 286050.6, 'denda' => 0, 'status' => 'unpaid', 'tanggal_jatuh_tempo' => $now->copy()->endOfMonth()->toDateString(), 'tanggal_bayar' => null],
            ['customer_id' => $customerModels[1]->id, 'meter_reading_id' => $meterModels[3]->id, 'bulan' => $meterModels[3]->bulan, 'tahun' => $meterModels[3]->tahun, 'total_kwh' => 312, 'total_biaya' => 518237.4, 'denda' => 0, 'status' => 'unpaid', 'tanggal_jatuh_tempo' => $now->copy()->subMonth()->endOfMonth()->toDateString(), 'tanggal_bayar' => null],
            ['customer_id' => $customerModels[2]->id, 'meter_reading_id' => $meterModels[5]->id, 'bulan' => $meterModels[5]->bulan, 'tahun' => $meterModels[5]->tahun, 'total_kwh' => 132, 'total_biaya' => 99860, 'denda' => 0, 'status' => 'paid', 'tanggal_jatuh_tempo' => $now->copy()->subMonth()->endOfMonth()->toDateString(), 'tanggal_bayar' => $now->copy()->subMonth()->subDays(3)->toDateString()],
            ['customer_id' => $customerModels[3]->id, 'meter_reading_id' => $meterModels[7]->id, 'bulan' => $meterModels[7]->bulan, 'tahun' => $meterModels[7]->tahun, 'total_kwh' => 550, 'total_biaya' => 983908.5, 'denda' => 50000, 'status' => 'overdue', 'tanggal_jatuh_tempo' => $now->copy()->subMonths(2)->endOfMonth()->toDateString(), 'tanggal_bayar' => null],
        ];

        $billModels = [];
        foreach ($billsData as $b) {
            $billModels[] = Bill::create($b);
        }

        // ─── 8. TRANSACTIONS ─────────────────────────────────────────────────────
        $transactions = [
            ['user_id' => $user->id, 'customer_id' => $customerModels[0]->id, 'bill_id' => $billModels[0]->id, 'payment_method_id' => $payMethods['qris']->id, 'type' => 'tagihan', 'amount' => 284606.9, 'status' => 'success', 'no_meter' => '531200012345', 'ref_number' => 'TRX-' . now()->format('Ymd') . '-00001'],
            ['user_id' => $user->id, 'customer_id' => $customerModels[2]->id, 'bill_id' => $billModels[4]->id, 'payment_method_id' => $payMethods['gopay']->id, 'type' => 'tagihan', 'amount' => 99860, 'status' => 'success', 'no_meter' => '531200031122', 'ref_number' => 'TRX-' . now()->format('Ymd') . '-00002'],
            ['user_id' => $user->id, 'customer_id' => $customerModels[0]->id, 'bill_id' => null, 'payment_method_id' => $payMethods['ovo']->id, 'type' => 'token', 'amount' => 50000, 'nominal' => '50000', 'status' => 'success', 'no_meter' => '531200012345', 'ref_number' => 'TRX-' . now()->format('Ymd') . '-00003', 'token_listrik' => '1234 5678 9012 3456 7890'],
            ['user_id' => $user->id, 'customer_id' => null, 'bill_id' => null, 'payment_method_id' => $payMethods['bca']->id, 'type' => 'token', 'amount' => 100000, 'nominal' => '100000', 'status' => 'failed', 'no_meter' => '999900001111', 'ref_number' => 'TRX-' . now()->format('Ymd') . '-00004'],
        ];

        foreach ($transactions as $t) {
            Transaction::create($t);
        }

        // ─── 9. NEWS ────────────────────────────────────────────────────────────
        if (class_exists(NewsSeeder::class)) {
            $this->call(NewsSeeder::class);
        }

        // ─── 10. OUTAGE REPORTS ──────────────────────────────────────────────────
        $outages = [
            [
                'user_id'     => $user->id,
                'customer_id' => $customerModels[0]->id,
                'kategori'    => 'padam_total',
                'deskripsi'   => 'Listrik padam total sejak jam 20:00 WIB malam ini.',
                'lokasi'      => 'Jl. Merdeka No. 10, RT 03/05, Jakarta Pusat',
                'status'      => 'selesai',
                'catatan_petugas' => 'Gangguan telah diperbaiki.',
            ],
            [
                'user_id'     => $user->id,
                'customer_id' => $customerModels[0]->id,
                'kategori'    => 'tegangan_rendah',
                'deskripsi'   => 'Tegangan listrik tidak stabil sejak 2 hari terakhir.',
                'lokasi'      => 'Jl. Merdeka No. 10, RT 03/05, Jakarta Pusat',
                'status'      => 'diproses',
                'catatan_petugas' => 'Petugas sedang melakukan pengecekan.',
            ],
            [
                'user_id'     => $user->id,
                'customer_id' => null,
                'kategori'    => 'meteran_rusak',
                'deskripsi'   => 'Display meteran digital menampilkan error.',
                'lokasi'      => 'Jl. Sudirman No. 25, Bandung',
                'status'      => 'dilaporkan',
                'catatan_petugas' => null,
            ],
        ];

        foreach ($outages as $o) {
            OutageReport::create($o);
        }
    }
}