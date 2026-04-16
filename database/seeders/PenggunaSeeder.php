<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        DB::table('pengguna')->insert([
            [
                'id_pengguna' => 1,
                'id_jenis_pengguna' => 1,
                'nama_pengguna' => 'Admin Sistem',
                'nim_pengguna' => 00000,
                'email_pengguna' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin',
            ],
            [
                'id_pengguna' => 2,
                'id_jenis_pengguna' => 2,
                'nama_pengguna' => 'Zefanya',
                'nim_pengguna' => '2341760001',
                'email_pengguna' => 'zefanya@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'mahasiswa',
            ],
            [
                'id_pengguna' => 3,
                'id_jenis_pengguna' => 2,
                'nama_pengguna' => 'Mahasiswa 2',
                'nim_pengguna' => '2341760002',
                'email_pengguna' => 'mhs2@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'mahasiswa',
            ],
        ]);
    }
}
