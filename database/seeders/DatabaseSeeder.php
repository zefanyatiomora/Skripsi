<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AreaFungsiSeeder::class,
            ClusterSkillSeeder::class,
            OkupasiSeeder::class,
            PenggunaSeeder::class
        ]);
    }
}