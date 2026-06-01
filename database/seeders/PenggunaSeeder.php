<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        DB::table('pengguna')->insert([
            [
                'id_pengguna' => 1,
                'id_jenis_pengguna' => 1,
                'nama_pengguna' => 'Admin Sistem',
                'username' => 'admin',
                'email_pengguna' => 'admin@gmail.com',
                'password' => '123456',
                'role' => 'admin',
            ],
            [
                'id_pengguna' => 2,
                'id_jenis_pengguna' => 2,
                'nama_pengguna' => 'Zefanya',
                'username' => 'zefanya',
                'email_pengguna' => 'zefanya@gmail.com',
                'password' => '123456',
                'role' => 'mahasiswa',
            ],
            [
                'id_pengguna' => 3,
                'id_jenis_pengguna' => 2,
                'nama_pengguna' => 'Mahasiswa 2',
                'username' => 'caca',
                'email_pengguna' => 'mhs2@gmail.com',
                'password' => '123456',
                'role' => 'mahasiswa',
            ],
        ]);
    }
}