<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScreeningPertanyaanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('screening_pertanyaan')->insert([

            // =====================================
            // 1. Frontend & UI Development
            // =====================================
            ['id_pertanyaan' => 1, 'pertanyaan' => 'Saya mampu membuat halaman web menggunakan HTML dan CSS.'],
            ['id_pertanyaan' => 2, 'pertanyaan' => 'Saya mampu membuat tampilan web yang responsif di berbagai ukuran layar.'],
            ['id_pertanyaan' => 3, 'pertanyaan' => 'Saya mampu memodifikasi tampilan website menggunakan JavaScript.'],
            ['id_pertanyaan' => 4, 'pertanyaan' => 'Saya mampu mengubah desain antarmuka menjadi halaman web yang berfungsi.'],

            // =====================================
            // 2. Backend & API Development
            // =====================================
            ['id_pertanyaan' => 5, 'pertanyaan' => 'Saya mampu membuat REST API untuk pertukaran data antar aplikasi.'],
            ['id_pertanyaan' => 6, 'pertanyaan' => 'Saya mampu menulis query SQL dan mengelola relasi database.'],
            ['id_pertanyaan' => 7, 'pertanyaan' => 'Saya mampu mengimplementasikan autentikasi dan otorisasi pengguna.'],
            ['id_pertanyaan' => 8, 'pertanyaan' => 'Saya terbiasa menggunakan framework backend seperti Laravel atau Express.js.'],


            // =====================================
            // 3. Web & Software Engineering
            // =====================================
            ['id_pertanyaan' => 9, 'pertanyaan' => 'Saya mampu membuat diagram atau dokumentasi perancangan sistem.'],
            ['id_pertanyaan' => 10, 'pertanyaan' => 'Saya mampu merancang arsitektur aplikasi sebelum proses pengembangan.'],
            ['id_pertanyaan' => 11, 'pertanyaan' => 'Saya mampu mengelola pengembangan aplikasi menggunakan Git.'],
            ['id_pertanyaan' => 12, 'pertanyaan' => 'Saya mampu menyusun dokumentasi kebutuhan dan desain sistem.'],

            // =====================================
            // 4. Mobile Development
            // =====================================
            ['id_pertanyaan' => 13, 'pertanyaan' => 'Saya mampu membuat aplikasi Android atau iOS.'],
            ['id_pertanyaan' => 14, 'pertanyaan' => 'Saya mampu menghubungkan aplikasi mobile dengan API.'],
            ['id_pertanyaan' => 15, 'pertanyaan' => 'Saya mampu mengimplementasikan fitur GPS, kamera, atau notifikasi pada aplikasi mobile.'],
            ['id_pertanyaan' => 16, 'pertanyaan' => 'Saya terbiasa melakukan pengujian aplikasi pada berbagai perangkat mobile.'],


            // =====================================
            // 5. Data, ERP & Information Management
            // =====================================
            ['id_pertanyaan' => 17, 'pertanyaan' => 'Saya mampu mengolah data menjadi laporan yang mendukung pengambilan keputusan.'],
            ['id_pertanyaan' => 18, 'pertanyaan' => 'Saya mampu membuat query untuk menganalisis data dalam jumlah besar.'],
            ['id_pertanyaan' => 19, 'pertanyaan' => 'Saya mampu memetakan proses bisnis suatu organisasi.'],
            ['id_pertanyaan' => 20, 'pertanyaan' => 'Saya mampu mengelola struktur dan kualitas data organisasi.'],

            // =====================================
            // 6. Analysis & Consulting
            // =====================================
            ['id_pertanyaan' => 21, 'pertanyaan' => 'Saya mampu menggali kebutuhan pengguna melalui wawancara atau observasi.'],
            ['id_pertanyaan' => 22, 'pertanyaan' => 'Saya mampu menerjemahkan kebutuhan bisnis menjadi kebutuhan sistem.'],
            ['id_pertanyaan' => 23, 'pertanyaan' => 'Saya mampu membuat rekomendasi solusi berdasarkan hasil analisis.'],
            ['id_pertanyaan' => 24, 'pertanyaan' => 'Saya mampu menyusun dokumen kebutuhan sistem secara terstruktur.'],

            // =====================================
            // 7. Infrastructure & Technical Support
            // =====================================
            ['id_pertanyaan' => 25, 'pertanyaan' => 'Saya mampu melakukan instalasi dan konfigurasi sistem operasi atau server.'],
            ['id_pertanyaan' => 26, 'pertanyaan' => 'Saya mampu mengelola jaringan komputer dasar.'],
            ['id_pertanyaan' => 27, 'pertanyaan' => 'Saya mampu mendiagnosis dan memperbaiki masalah teknis perangkat atau sistem.'],
            ['id_pertanyaan' => 28, 'pertanyaan' => 'Saya mampu memantau kinerja dan ketersediaan layanan TI.'],

            // =====================================
            // 8. Quality Assurance & Multimedia
            // =====================================
            ['id_pertanyaan' => 29, 'pertanyaan' => 'Saya mampu menyusun skenario pengujian aplikasi.'],
            ['id_pertanyaan' => 30, 'pertanyaan' => 'Saya mampu menemukan bug berdasarkan hasil pengujian sistem.'],
            ['id_pertanyaan' => 31, 'pertanyaan' => 'Saya mampu membuat atau mengolah konten multimedia digital.'],
            ['id_pertanyaan' => 32, 'pertanyaan' => 'Saya mampu memastikan aplikasi memenuhi kebutuhan pengguna sebelum dirilis.'],

            // =====================================
            // 9. Governance, Risk & Security
            // =====================================
            ['id_pertanyaan' => 33, 'pertanyaan' => 'Saya mampu mengidentifikasi risiko keamanan informasi.'],
            ['id_pertanyaan' => 34, 'pertanyaan' => 'Saya mampu melakukan analisis dampak kebocoran data.'],
            ['id_pertanyaan' => 35, 'pertanyaan' => 'Saya mampu memeriksa kepatuhan sistem terhadap regulasi atau kebijakan.'],
            ['id_pertanyaan' => 36, 'pertanyaan' => 'Saya mampu menyusun rekomendasi pengendalian risiko TI.'],

            // =====================================
            // 10. Architecture & Product Management
            // =====================================
            ['id_pertanyaan' => 37, 'pertanyaan' => 'Saya mampu menyusun backlog dan prioritas pengembangan produk.'],
            ['id_pertanyaan' => 38, 'pertanyaan' => 'Saya mampu mengelola pekerjaan tim menggunakan metode Agile atau Scrum.'],
            ['id_pertanyaan' => 39, 'pertanyaan' => 'Saya mampu merancang arsitektur bisnis atau teknologi organisasi.'],
            ['id_pertanyaan' => 40, 'pertanyaan' => 'Saya mampu menyusun roadmap pengembangan produk atau sistem.'],
        ]);
    }
}
