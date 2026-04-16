<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            JenisPenggunaSeeder::class, // ⬅️ HARUS PALING AWAL
            AreaFungsiSeeder::class,
            ClusterSkillSeeder::class,
            OkupasiSeeder::class,
            KompetensiSeeder::class,
            OkupasiKompetensiSeeder::class,
            PenggunaSeeder::class, // ⬅️ TERAKHIR
        ]);
    }
}