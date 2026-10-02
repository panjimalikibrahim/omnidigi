<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $newsData = [
            // ==================== DATA INFORMASI (11 Data) ====================
            [
                'judul'        => 'PLN Hadirkan Layanan Digital Terintegrasi untuk Kemudahan Pelanggan',
                'kategori'     => 'info',
                'gambar'       => 'info1.jpg',
                'konten'       => "PT PLN (Persero) terus berinovasi dalam menghadirkan layanan digital yang terintegrasi melalui aplikasi PLN DIGI.\n\nMelalui platform ini, pelanggan dapat mengakses seluruh informasi pembayaran tagihan, pembelian token listrik prabayar, serta pengaduan gangguan secara real-time dan transparan demi kenyamanan transaksi masyarakat Indonesia.",
                'published_at' => now(),
                'is_published' => true,
            ],
            [
                'judul'        => 'Informasi Tarif Tenaga Listrik (TTL) Periode Triwulan IV Tahun 2026',
                'kategori'     => 'info',
                'gambar'       => 'info2.jpg',
                'konten'       => "PLN memastikan Tarif Tenaga Listrik (TTL) untuk 13 golongan pelanggan non-subsidi tetap tidak mengalami perubahan pada periode Triwulan IV Tahun 2026.\n\nLangkah ini diambil pemerintah dan PLN untuk menjaga daya beli masyarakat, mendukung pertumbuhan ekonomi nasional, serta memberikan kepastian efisiensi bagi sektor industri.",
                'published_at' => now()->subDays(1),
                'is_published' => true,
            ],
            [
                'judul'        => 'Perluas Ekosistem EV, PLN Tambah Titik SPKLU Digital di Jalur Utama',
                'kategori'     => 'info',
                'gambar'       => 'info3.jpg',
                'konten'       => "Mendukung percepatan penggunaan kendaraan listrik berbasis baterai di Indonesia, PLN terus memperluas jaringan Stasiun Pengisian Kendaraan Listrik Umum (SPKLU).\n\nKini seluruh titik lokasi pengisian daya SPKLU beserta status ketersediaannya dapat dipantau secara langsung melalui peta interaktif aplikasi PLN DIGI.",
                'published_at' => now()->subDays(2),
                'is_published' => true,
            ],
            [
                'judul'        => 'Komitmen Transisi Energi, PLN Operasikan Pembangkit Listrik Tenaga Surya Terapung Baru',
                'kategori'     => 'info',
                'gambar'       => 'info4.jpg',
                'konten'       => "Dalam upaya mempercepat pencapaian target Net Zero Emission (NZE), PLN secara resmi mengoperasikan fasilitas Pembangkit Listrik Tenaga Surya (PLTS) Terapung skala besar.\n\nInovasi pemanfaatan permukaan waduk ini mempertegas komitmen PLN dalam menghadirkan pasokan energi bersih terbarukan yang ramah lingkungan.",
                'published_at' => now()->subDays(3),
                'is_published' => true,
            ],
            [
                'judul'        => 'Imbauan Keselamatan Ketenagalistrikan Menghadapi Cuaca Ekstrem & Musim Hujan',
                'kategori'     => 'info',
                'gambar'       => 'info5.jpg',
                'konten'       => "Menghadapi potensi curah hujan tinggi dan cuaca ekstrem, PLN memberikan imbauan keselamatan ketenagalistrikan bagi seluruh lapisan masyarakat.\n\nPLN mengingatkan masyarakat untuk mematikan instalasi listrik dari kWh meter jika terjadi genangan air atau banjir demi mencegah risiko bahaya korsleting dan keselamatan jiwa.",
                'published_at' => now()->subDays(4),
                'is_published' => true,
            ],
            [
                'judul'        => 'Pemasangan Smart Meter AMI Capai Jutaan Pelanggan di Seluruh Indonesia',
                'kategori'     => 'info',
                'gambar'       => 'info6.jpg',
                'konten'       => "Program modernisasi kWh meter menjadi Smart Meter berbasis Advanced Metering Infrastructure (AMI) terus berlangsung secara masif.\n\nDengan Smart Meter AMI, pencatatan konsumsi listrik dapat dilakukan secara otomatis dan akurat dari jarak jauh tanpa perlu petugas mencatat ke rumah, sehingga menjaga privasi dan kenyamanan pelanggan.",
                'published_at' => now()->subDays(5),
                'is_published' => true,
            ],
            [
                'judul'        => 'PLN Jamin Pasokan Listrik Andal untuk Dukung Pertumbuhan Kawasan Industri',
                'kategori'     => 'info',
                'gambar'       => 'info7.jpg',
                'konten'       => "PLN berkomitmen memberikan pasokan kelistrikan yang andal dan berkualitas tanpa kedip (zero down time) bagi sektor usaha dan kawasan industri.\n\nMelalui kerja sama strategis ini, PLN siap mendukung percepatan roda perekonomian dan daya saing investasi hilirisasi di Indonesia.",
                'published_at' => now()->subDays(6),
                'is_published' => true,
            ],
            [
                'judul'        => 'Fitur Asisten Virtual AI PLN DIGI Siap Melayani Pengaduan Pelanggan 24 Jam',
                'kategori'     => 'info',
                'gambar'       => 'info8.jpg',
                'konten'       => "PLN meluncurkan fitur Asisten Virtual berbasis Kecerdasan Buatan (AI Chatbot) pada platform PLN DIGI.\n\nLayanan pintar ini siap memberikan solusi dan jawaban instan selama 24 jam nonstop terkait konsultasi tagihan, informasi permohonan pasang baru, serta pelaporan gangguan kelistrikan.",
                'published_at' => now()->subDays(7),
                'is_published' => true,
            ],
            [
                'judul'        => 'Penerapan Standar Keamanan Siber Internasional pada Sistem Transaksi PLN DIGI',
                'kategori'     => 'info',
                'gambar'       => 'info9.jpg',
                'konten'       => "Guna memberikan rasa aman pada setiap transaksi pembayaran digital, PLN menerapkan enkripsi ketat sesuai standar keamanan ciber internasional.\n\nSistem ini menjamin kerahasiaan data pribadi serta keamanan finansial seluruh pengguna saat bertransaksi di dalam aplikasi.",
                'published_at' => now()->subDays(8),
                'is_published' => true,
            ],
            [
                'judul'        => 'Mewujudkan Keadilan Energi, PLN Berhasil Salurkan Listrik ke Desa Terpencil Wilayah 3T',
                'kategori'     => 'info',
                'gambar'       => 'info10.jpg',
                'konten'       => "Melalui program Listrik Desa (Lisdes), PLN sukses menembus tantangan geografis untuk menyambungkan jaringan listrik di wilayah Terdepan, Terluar, dan Tertinggal (3T).\n\nHadirnya listrik diharapkan dapat menggerakkan roda ekonomi lokal, mendukung sarana pendidikan, dan meningkatkan kualitas hidup masyarakat.",
                'published_at' => now()->subDays(9),
                'is_published' => true,
            ],
            [
                'judul'        => 'Program TJSL PLN Salurkan Bantuan Peralatan Usaha Berbasis Listrik bagi UMKM',
                'kategori'     => 'info',
                'gambar'       => 'info11.jpg',
                'konten'       => "Melalui program Tanggung Jawab Sosial dan Lingkungan (TJSL), PLN menyerahkan bantuan peralatan produksi modern bernilai tambah bagi para pelaku UMKM.\n\nDukungan electrifying agriculture dan bantuan usaha berbasis listrik ini bertujuan untuk meningkatkan produktivitas serta kemandirian ekonomi warga setempat.",
                'published_at' => now()->subDays(10),
                'is_published' => true,
            ],

            // ==================== DATA PROMO (6 Data Baru) ====================
            [
                'judul'        => 'Promo "Listrik Ceria": Diskon Tambah Daya Hingga 50% di Aplikasi PLN DIGI',
                'kategori'     => 'promo',
                'gambar'       => 'promo1.jpg',
                'konten'       => "Sambut momen spesial dengan promo 'Listrik Ceria'! PLN memberikan diskon biaya penambahan daya listrik hingga 50% bagi seluruh pelanggan rumah tangga dan bisnis kecil.\n\nCukup masukkan kode voucher promo promo saat mengajukan permohonan tambah daya melalui aplikasi PLN DIGI.",
                'published_at' => now(),
                'is_published' => true,
            ],
            [
                'judul'        => 'Cashback Beli Token Listrik 30% Pakai E-Wallet Partner PLN DIGI',
                'kategori'     => 'promo',
                'gambar'       => 'promo2.jpg',
                'konten'       => "Beli token listrik makin hemat melalui PLN DIGI! Dapatkan cashback saldo e-wallet hingga 30% untuk setiap transaksi pembelian token listrik prabayar minimal Rp100.000.\n\nPromo ini berlaku terbatas setiap hari Jumat dan dapat diklaim langsung dari menu promo transaksi.",
                'published_at' => now()->subDays(1),
                'is_published' => true,
            ],
            [
                'judul'        => 'Promo Kendaraan Listrik "Home Charging Services": Beli EV Get Gratis Biaya Pasang Baru',
                'kategori'     => 'promo',
                'gambar'       => 'promo3.jpg',
                'konten'       => "Mendukung percepatan pengadopsian kendaraan listrik di Indonesia, PLN menghadirkan paket spesial 'Home Charging Services'.\n\nNikmati diskon biaya penyambungan baru serta ekstra potongan tarif energi hingga 30% untuk pengisian daya kendaraan listrik pada pukul 22.00 - 05.00 WIB.",
                'published_at' => now()->subDays(2),
                'is_published' => true,
            ],
            [
                'judul'        => 'Program "Electrifying Agriculture": Insentif Khusus Listrik Sektor Usaha Tani & Tambak',
                'kategori'     => 'promo',
                'gambar'       => 'promo4.jpg',
                'konten'       => "PLN memberikan potongan biaya operasional kelistrikan bagi para petani dan petambak yang melakukan modernisasi mesin produksi menggunakan daya listrik.\n\nDapatkan insentif pengurangan biaya pasang baru dan kemudahan instalasi jaringan di kawasan lahan pertanian.",
                'published_at' => now()->subDays(3),
                'is_published' => true,
            ],
            [
                'judul'        => 'Promo Hari Listrik Nasional: Bebas Biaya Transaksi Pembayaran Tagihan Listrik',
                'kategori'     => 'promo',
                'gambar'       => 'promo5.jpg',
                'konten'       => "Meriahkan peringatan Hari Listrik Nasional dengan promo bebas biaya admin transaksi!\n\nSeluruh pelanggan pascabayar yang membayar tagihan listrik tepat waktu sebelum tanggal 20 bulan ini melalui aplikasi PLN DIGI tidak akan dikenakan biaya administrasi.",
                'published_at' => now()->subDays(4),
                'is_published' => true,
            ],
            [
                'judul'        => 'Voucher Diskon "Green Energy": Klaim Sertifikat Energi Terbarukan (REC) Lebih Murah',
                'kategori'     => 'promo',
                'gambar'       => 'promo6.jpg',
                'konten'       => "Ikut berkontribusi dalam mendukung penggunaan energi bersih yang ramah lingkungan.\n\nDapatkan voucher potongan harga khusus untuk setiap pembelian Renewable Energy Certificate (REC) PLN melalui fitur Green Energy di aplikasi PLN DIGI.",
                'published_at' => now()->subDays(5),
                'is_published' => true,
            ],

            // ==================== DATA PENGHARGAAN (5 Data Baru) ====================
            [
                'judul'        => 'PLN DIGI Sabet Penghargaan Best Digital Public Service Experience 2026',
                'kategori'     => 'penghargaan',
                'gambar'       => 'penghargaan1.jpg',
                'konten'       => "Aplikasi PLN DIGI berhasil meraih penghargaan utama dalam ajang Indonesia Digital Excellence Awards 2026.\n\nPenghargaan ini diberikan atas komitmen PLN dalam menghadirkan kemudahan akses layanan listrik, kepastian pembayaran tagihan, dan respon pengaduan cepat berbasis teknologi digital.",
                'published_at' => now(),
                'is_published' => true,
            ],
            [
                'judul'        => 'Raih Gold Award di Ajang Transisi Energi Internasional untuk Proyek PLTS Terapung',
                'kategori'     => 'penghargaan',
                'gambar'       => 'penghargaan2.jpg',
                'konten'       => "Inovasi pembangkit listrik ramah lingkungan PLN kembali mendapat pengakuan di kancah global.\n\nPLN sukses meraih Gold Award kategori Sustainable Energy Innovation atas keberhasilan pengembangan infrastruktur PLTS Terapung yang efisien dan berkelanjutan.",
                'published_at' => now()->subDays(1),
                'is_published' => true,
            ],
            [
                'judul'        => 'PLN Sabet Penghargaan Top BUMN Awards 2026 Kategori Digital Transformation Leaders',
                'kategori'     => 'penghargaan',
                'gambar'       => 'penghargaan3.jpg',
                'konten'       => "PLN dinobatkan sebagai pemimpin transformasi digital terbaik BUMN pada ajang Top BUMN Awards 2026.\n\nPencapaian ini didorong oleh digitalisasi jaringan kelistrikan, penerapan Smart Meter AMI, serta pengintegrasian sistem data pelanggan secara komprehensif.",
                'published_at' => now()->subDays(2),
                'is_published' => true,
            ],
            [
                'judul'        => 'Direktur Utama PLN Raih Penghargaan Outstanding Leader in Green Infrastructure Development',
                'kategori'     => 'penghargaan',
                'gambar'       => 'penghargaan4.jpg',
                'konten'       => "Kepemimpinan transformatif PLN dalam mendorong transisi energi bersih dianugerahi penghargaan kepemimpinan hijau nasional.\n\nPLN dinilai konsisten membangun jaringan SPKLU digital dan memperluas pembangkit energi terbarukan di berbagai wilayah Indonesia.",
                'published_at' => now()->subDays(3),
                'is_published' => true,
            ],
            [
                'judul'        => 'PLN DIGI Menangkan Penghargaan Innovation in Customer Care & AI Chatbot Services',
                'kategori'     => 'penghargaan',
                'gambar'       => 'penghargaan5.jpg',
                'konten'       => "Layanan Asisten Virtual AI pada aplikasi PLN DIGI dianugerahi penghargaan sebagai inovasi layanan pelanggan paling responsif.\n\nSistem AI ini dinilai berhasil memangkas waktu penyelesaian laporan gangguan dan memberikan kejelasan informasi transaksi selama 24 jam nonstop.",
                'published_at' => now()->subDays(4),
                'is_published' => true,
            ],

            // ==================== DATA GANGGUAN (4 Data Baru) ====================
            [
                'judul'        => 'Pemeliharaan Berkala Jaringan Listrik dan Penataan Gardu Area Jakarta Barat',
                'kategori'     => 'gangguan',
                'gambar'       => 'gangguan1.jpg',
                'konten'       => "Dalam rangka meningkatkan keandalan pasokan energi listrik, PLN melaksanakan pemeliharaan preventif jaringan distribusi di wilayah Jakarta Barat.\n\nProses pemeliharaan meliputi pembersihan komponen gardu serta optimalisasi jaringan guna mencegah potensi gangguan di masa mendatang.",
                'published_at' => now(),
                'is_published' => true,
            ],
            [
                'judul'        => 'Informasi Gangguan Penyulang Akibat Pohon Tumbang Dampak Cuaca Ekstrem',
                'kategori'     => 'gangguan',
                'gambar'       => 'gangguan2.jpg',
                'konten'       => "Hujan deras disertai angin kencang menyebabkan pohon tumbang dan mengenai jaringan kabel penyulang PLN.\n\nTim Pelayanan Teknik PLN bergerak cepat di lapangan untuk melakukan evakuasi dahan serta pemulihan jaringan secara bertahap demi keselamatan warga.",
                'published_at' => now()->subDays(1),
                'is_published' => true,
            ],
            [
                'judul'        => 'Jadwal Pemeliharaan Transformator Gardu Induk Sektor Kawasan Industri',
                'kategori'     => 'gangguan',
                'gambar'       => 'gangguan3.jpg',
                'konten'       => "PLN menginformasikan jadwal pemeliharaan terencana pada unit transformator gardu induk pendukung sektor industri.\n\nPemeliharaan ini bertujuan memastikan kapasitas distribusi listrik tetap optimal dan mencegah pemadaman tak terduga pada jam operasional.",
                'published_at' => now()->subDays(2),
                'is_published' => true,
            ],
            [
                'judul'        => 'Penanganan Cepat Gangguan Kabel Bawah Tanah Jalur Protokol',
                'kategori'     => 'gangguan',
                'gambar'       => 'gangguan4.jpg',
                'konten'       => "Tim teknis PLN merespons laporan penurunan tegangan pada jaringan kabel bawah tanah di jalur utama kota.\n\nProses penelusuran titik gangguan menggunakan peralatan deteksi modern sehingga perbaikan dapat diselesaikan secara tepat dan efisien.",
                'published_at' => now()->subDays(3),
                'is_published' => true,
            ],

            // ==================== DATA TIPS & TRIK (6 Data Baru) ====================
            [
                'judul'        => '5 Cara Efektif Menghemat Tagihan Listrik AC Tanpa Mengurangi Kenyamanan',
                'kategori'     => 'tips',
                'gambar'       => 'tips1.jpg',
                'konten'       => "Penggunaan AC merupakan salah satu penyumbang konsumsi listrik terbesar di rumah tangga.\n\nUntuk menghemat energi, atur suhu AC pada tingkat ideal 24-26°C, manfaatkan fitur timer otomatis menjelang pagi, serta pastikan untuk membersihkan filter AC secara berkala setiap 3 bulan sekali.",
                'published_at' => now(),
                'is_published' => true,
            ],
            [
                'judul'        => 'Panduan Aman Mencegah Bahaya Korsleting Listrik di Rumah Saat Musim Hujan',
                'kategori'     => 'tips',
                'gambar'       => 'tips2.jpg',
                'konten'       => "Musim hujan memerlukan kewaspadaan ekstra terhadap potensi bahaya kelistrikan di dalam rumah.\n\nPastikan tidak ada steker yang menumpuk berlebihan, jauhkan peralatan elektronik dari area atap yang bocor, dan segera turunkan sakelar MCB utama jika terjadi genangan air.",
                'published_at' => now()->subDays(1),
                'is_published' => true,
            ],
            [
                'judul'        => 'Mengenal Perbedaan Token Listrik Prabayar dan Pembayaran Pasca Bayar',
                'kategori'     => 'tips',
                'gambar'       => 'tips3.jpg',
                'konten'       => "Memilih sistem kelistrikan yang sesuai membantu pengelolaan keuangan keluarga menjadi lebih teratur.\n\nLayanan Prabayar memberikan kendali penuh pembelian kuota kWh sesuai anggaran, sedangkan Pascabayar memberikan kepastian pemakaian terus-menerus dengan pembayaran rutin tiap bulan.",
                'published_at' => now()->subDays(2),
                'is_published' => true,
            ],
            [
                'judul'        => 'Trik Memilih Lampu LED Hemat Energi yang Tepat untuk Setiap Ruangan',
                'kategori'     => 'tips',
                'gambar'       => 'tips4.jpg',
                'konten'       => "Mengganti lampu pijar konvensional dengan teknologi LED dapat menekan pemakaian daya hingga 80%.\n\nPilih tingkat kecerahan (lumen) yang sesuai fungsi ruangan, seperti watt rendah untuk kamar tidur dan pencahayaan terang efisien untuk ruang kerja atau dapur.",
                'published_at' => now()->subDays(3),
                'is_published' => true,
            ],
            [
                'judul'        => 'Tips Merawat kWh Meter Digital Agar Bebas Masalah dan Pencatatan Selalu Akurat',
                'kategori'     => 'tips',
                'gambar'       => 'tips5.jpg',
                'konten'       => "kWh meter merupakan alat ukur utama pemakaian listrik yang terpasang di dinding luar rumah Anda.\n\nJaga kebersihan fisik kover meteran dari debu dan sarang serangga, serta pastikan segel resmi PLN tetap utuh tanpa bongkaran mandiri.",
                'published_at' => now()->subDays(4),
                'is_published' => true,
            ],
            [
                'judul'        => 'Cara Mudah Memantau Riwayat Penggunaan Listrik Bulanan Lewat Aplikasi PLN DIGI',
                'kategori'     => 'tips',
                'gambar'       => 'tips6.jpg',
                'konten'       => "Aplikasi PLN DIGI menyediakan fitur grafik riwayat pemakaian daya yang dapat diakses kapan saja.\n\nDengan memantau tren pemakaian harian dan bulanan, Anda dapat mendeteksi pemborosan energi secara dini dan merencanakan pembelian token listrik lebih efisien.",
                'published_at' => now()->subDays(5),
                'is_published' => true,
            ],
        ];

        foreach ($newsData as $data) {
            $slug = Str::slug($data['judul']);

            News::updateOrCreate(
                ['slug' => $slug],
                [
                    'judul'        => $data['judul'],
                    'slug'         => $slug,
                    'kategori'     => $data['kategori'],
                    'gambar'       => $data['gambar'],
                    'konten'       => $data['konten'],
                    'published_at' => $data['published_at'],
                    'is_published' => $data['is_published'],
                ]
            );
        }
    }
}