<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPenggunaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jenis_pengguna')->insert([
            [
                'id_jenis_pengguna' => 1,
                'nama_jenis_pengguna' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jenis_pengguna' => 2,
                'nama_jenis_pengguna' => 'mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}