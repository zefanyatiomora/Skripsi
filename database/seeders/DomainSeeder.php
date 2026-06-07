<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('domain')->insert([

            [
                'id_domain' => 1,
                'nama_domain' => 'Membuat website, aplikasi mobile, dan perangkat lunak',
            ],

            [
                'id_domain' => 2,
                'nama_domain' => 'Mengolah data, sistem informasi, ERP, dan analisis kebutuhan bisnis',
            ],

            [
                'id_domain' => 3,
                'nama_domain' => 'Mengelola jaringan, server, sistem komputer, dan dukungan teknis',
            ],

            [
                'id_domain' => 4,
                'nama_domain' => 'Keamanan informasi, audit, tata kelola, risiko, dan manajemen produk',
            ],

        ]);
    }
}