<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScreeningPertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('screening_pertanyaan')->insert([

            [
                'id_pertanyaan' => 1,
                'pertanyaan' => 'Saya tertarik membuat tampilan website atau aplikasi yang menarik'
            ],
            [
                'id_pertanyaan' => 2,
                'pertanyaan' => 'Saya suka membuat fitur dan logika pada website'
            ],
            [
                'id_pertanyaan' => 3,
                'pertanyaan' => 'Saya tertarik mengembangkan aplikasi Android atau iOS'
            ],
            [
                'id_pertanyaan' => 4,
                'pertanyaan' => 'Saya suka mencoba dan mengembangkan aplikasi mobile'
            ],
            [
                'id_pertanyaan' => 5,
                'pertanyaan' => 'Saya suka merancang dan membangun sistem perangkat lunak'
            ],
            [
                'id_pertanyaan' => 6,
                'pertanyaan' => 'Saya tertarik debugging dan memperbaiki error program'
            ],
            [
                'id_pertanyaan' => 7,
                'pertanyaan' => 'Saya tertarik mengelola dan merancang basis data'
            ],
            [
                'id_pertanyaan' => 8,
                'pertanyaan' => 'Saya suka mengolah data dan memastikan data tersimpan dengan baik'
            ],
            [
                'id_pertanyaan' => 9,
                'pertanyaan' => 'Saya suka menganalisis kebutuhan sistem atau bisnis'
            ],
            [
                'id_pertanyaan' => 10,
                'pertanyaan' => 'Saya tertarik menjadi penghubung antara kebutuhan bisnis dan teknologi'
            ],
            [
                'id_pertanyaan' => 11,
                'pertanyaan' => 'Saya suka membantu pengguna menyelesaikan masalah teknis komputer atau sistem'
            ],
            [
                'id_pertanyaan' => 12,
                'pertanyaan' => 'Saya tertarik melakukan instalasi, konfigurasi, atau pemeliharaan sistem TI'
            ],
            [
                'id_pertanyaan' => 13,
                'pertanyaan' => 'Saya tertarik mempelajari proses bisnis perusahaan melalui sistem ERP'
            ],
            [
                'id_pertanyaan' => 14,
                'pertanyaan' => 'Saya suka mengelola sistem perusahaan yang terintegrasi'
            ],
            [
                'id_pertanyaan' => 15,
                'pertanyaan' => 'Saya tertarik melakukan pengujian kualitas perangkat lunak'
            ],
            [
                'id_pertanyaan' => 16,
                'pertanyaan' => 'Saya suka mencari bug atau kesalahan pada aplikasi'
            ],
            [
                'id_pertanyaan' => 17,
                'pertanyaan' => 'Saya tertarik membuat atau mengembangkan teknologi multimedia'
            ],
            [
                'id_pertanyaan' => 18,
                'pertanyaan' => 'Saya suka desain multimedia, audio visual, atau teknologi interaktif'
            ],
            [
                'id_pertanyaan' => 19,
                'pertanyaan' => 'Saya tertarik keamanan sistem dan perlindungan data'
            ],
            [
                'id_pertanyaan' => 20,
                'pertanyaan' => 'Saya suka mempelajari risiko keamanan informasi'
            ],
            [
                'id_pertanyaan' => 21,
                'pertanyaan' => 'Saya tertarik melakukan audit atau evaluasi sistem informasi'
            ],
            [
                'id_pertanyaan' => 22,
                'pertanyaan' => 'Saya suka memeriksa kesesuaian prosedur dan pengelolaan TI'
            ],
            [
                'id_pertanyaan' => 23,
                'pertanyaan' => 'Saya tertarik perlindungan data pribadi dan privasi pengguna'
            ],
            [
                'id_pertanyaan' => 24,
                'pertanyaan' => 'Saya suka memastikan data pengguna dikelola dengan aman'
            ],
            [
                'id_pertanyaan' => 25,
                'pertanyaan' => 'Saya tertarik merancang struktur sistem atau teknologi organisasi'
            ],
            [
                'id_pertanyaan' => 26,
                'pertanyaan' => 'Saya suka membuat perencanaan teknologi jangka panjang'
            ],
            [
                'id_pertanyaan' => 27,
                'pertanyaan' => 'Saya tertarik mengelola proyek pengembangan sistem atau aplikasi'
            ],
            [
                'id_pertanyaan' => 28,
                'pertanyaan' => 'Saya suka mengatur tim dan pembagian pekerjaan dalam proyek TI'
            ],
            [
                'id_pertanyaan' => 29,
                'pertanyaan' => 'Saya tertarik memberikan solusi atau saran terkait teknologi informasi'
            ],
            [
                'id_pertanyaan' => 30,
                'pertanyaan' => 'Saya suka berdiskusi dan membantu menyelesaikan permasalahan TI pada organisasi'
            ],

        ]);
    }
}