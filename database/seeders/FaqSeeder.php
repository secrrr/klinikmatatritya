<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqs = [
            // Layanan
            [
                'category' => 'layanan',
                'question' => 'Apa saja jenis pemeriksaan mata yang tersedia di Klinik Mata Tritya?',
                'answer' => 'Kami menyediakan berbagai jenis pemeriksaan mata seperti pemeriksaan refraksi, tonometri (tekanan bola mata), pemeriksaan retina, dan pemeriksaan komprehensif untuk mendeteksi berbagai gangguan mata.',
            ],
            [
                'category' => 'layanan',
                'question' => 'Apa itu EMC dan siapa yang perlu melakukannya?',
                'answer' => 'EMC (Eye Medical Check-up) adalah pemeriksaan mata menyeluruh yang direkomendasikan untuk semua usia, terutama bagi yang mengalami gangguan penglihatan atau memiliki riwayat penyakit mata dalam keluarga.',
            ],
            [
                'category' => 'layanan',
                'question' => 'Apakah tersedia layanan pemeriksaan mata untuk anak-anak?',
                'answer' => 'Ya, kami memiliki layanan khusus untuk pemeriksaan mata anak dengan dokter spesialis mata anak dan peralatan yang ramah anak.',
            ],
            [
                'category' => 'layanan',
                'question' => 'Berapa frekuensi ideal untuk melakukan pemeriksaan mata rutin?',
                'answer' => 'Untuk orang dewasa normal, disarankan setiap 1-2 tahun sekali. Namun bagi yang memiliki gangguan mata atau menggunakan kacamata/lensa kontak, sebaiknya 6 bulan - 1 tahun sekali.',
            ],

            // Pembiayaan
            [
                'category' => 'pembiayaan',
                'question' => 'Metode pembayaran apa saja yang diterima?',
                'answer' => 'Kami menerima pembayaran tunai, debit, kartu kredit, dan transfer bank. Tersedia juga opsi cicilan untuk tindakan tertentu.',
            ],
            [
                'category' => 'pembiayaan',
                'question' => 'Asuransi apa saja yang bekerja sama dengan klinik?',
                'answer' => 'Kami bekerja sama dengan BPJS Kesehatan, BRI Life, BNI Life, AdMedika, Pertamina, BPJS Ketenagakerjaan, dan berbagai asuransi swasta lainnya.',
            ],
            [
                'category' => 'pembiayaan',
                'question' => 'Apakah bisa menggunakan BPJS untuk semua layanan?',
                'answer' => 'Ya, BPJS dapat digunakan untuk berbagai layanan pemeriksaan dan tindakan mata yang termasuk dalam cakupan BPJS. Silakan konfirmasi terlebih dahulu untuk layanan tertentu.',
            ],

            // Tindakan
            [
                'category' => 'tindakan',
                'question' => 'Apakah klinik melayani operasi katarak?',
                'answer' => 'Ya, kami melayani operasi katarak dengan teknologi phacoemulsification modern dan dokter spesialis mata yang berpengalaman.',
            ],
            [
                'category' => 'tindakan',
                'question' => 'Berapa lama waktu pemulihan setelah operasi LASIK?',
                'answer' => 'Pemulihan LASIK umumnya cepat. Penglihatan mulai membaik dalam 24-48 jam, dan aktivitas normal dapat dilakukan dalam 1-2 minggu dengan instruksi dokter.',
            ],
            [
                'category' => 'tindakan',
                'question' => 'Apakah operasi mata aman untuk lansia?',
                'answer' => 'Ya, operasi mata seperti katarak sangat aman untuk lansia. Dokter akan melakukan pemeriksaan menyeluruh terlebih dahulu untuk memastikan kondisi pasien.',
            ],

             // Reservasi
            [
                'category' => 'reservasi',
                'question' => 'Bagaimana cara membuat janji temu?',
                'answer' => 'Anda dapat membuat janji melalui website kami, telepon, WhatsApp, atau datang langsung ke klinik. Reservasi online dapat dilakukan 24/7.',
            ],
            [
                'category' => 'reservasi',
                'question' => 'Berapa lama waktu tunggu untuk pemeriksaan?',
                'answer' => 'Dengan sistem reservasi, waktu tunggu minimal. Untuk pasien walk-in, waktu tunggu tergantung antrian, biasanya 30-60 menit.',
            ],
            [
                'category' => 'reservasi',
                'question' => 'Apakah bisa reschedule atau membatalkan janji?',
                'answer' => 'Ya, Anda dapat melakukan reschedule atau pembatalan maksimal 24 jam sebelum jadwal janji temu melalui telepon atau WhatsApp.',
            ],
        ];

        foreach ($faqs as $faq) {
            \App\Models\Faq::create($faq);
        }
    }
}