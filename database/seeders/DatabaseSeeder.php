<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            JenisPenggunaSeeder::class, 
            AreaFungsiSeeder::class,
            DomainSeeder::class,
            ClusterSkillSeeder::class,
            OkupasiSeeder::class,
            KompetensiSeeder::class,
            OkupasiKompetensiSeeder::class,
            PenggunaSeeder::class,
            ScreeningPertanyaanSeeder::class,
            ScreeningMappingSeeder::class
        ]);
    }
}