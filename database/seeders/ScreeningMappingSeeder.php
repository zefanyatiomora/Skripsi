<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScreeningMappingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('screening_mapping')->insert([

            // Web Development
            ['id_pertanyaan' => 1, 'id_cluster_skill' => 1],
            ['id_pertanyaan' => 2, 'id_cluster_skill' => 1],

            // Mobile Development
            ['id_pertanyaan' => 3, 'id_cluster_skill' => 2],
            ['id_pertanyaan' => 4, 'id_cluster_skill' => 2],

            // Software Engineering
            ['id_pertanyaan' => 5, 'id_cluster_skill' => 3],
            ['id_pertanyaan' => 6, 'id_cluster_skill' => 3],

            // Data & Database
            ['id_pertanyaan' => 7, 'id_cluster_skill' => 4],
            ['id_pertanyaan' => 8, 'id_cluster_skill' => 4],

            // Analysis & Business
            ['id_pertanyaan' => 9, 'id_cluster_skill' => 5],
            ['id_pertanyaan' => 10, 'id_cluster_skill' => 5],

            // Infrastructure / Support
            ['id_pertanyaan' => 11, 'id_cluster_skill' => 6],
            ['id_pertanyaan' => 12, 'id_cluster_skill' => 6],

            // ERP & Enterprise System
            ['id_pertanyaan' => 13, 'id_cluster_skill' => 7],
            ['id_pertanyaan' => 14, 'id_cluster_skill' => 7],

            // Quality Assurance
            ['id_pertanyaan' => 15, 'id_cluster_skill' => 8],
            ['id_pertanyaan' => 16, 'id_cluster_skill' => 8],

            // Multimedia Technology
            ['id_pertanyaan' => 17, 'id_cluster_skill' => 9],
            ['id_pertanyaan' => 18, 'id_cluster_skill' => 9],

            // Security / Privacy Engineering
            ['id_pertanyaan' => 19, 'id_cluster_skill' => 10],
            ['id_pertanyaan' => 20, 'id_cluster_skill' => 10],

            // Audit
            ['id_pertanyaan' => 21, 'id_cluster_skill' => 11],
            ['id_pertanyaan' => 22, 'id_cluster_skill' => 11],

            // Perlindungan Data Pribadi
            ['id_pertanyaan' => 23, 'id_cluster_skill' => 12],
            ['id_pertanyaan' => 24, 'id_cluster_skill' => 12],

            // Arsitektur Sistem / Teknologi
            ['id_pertanyaan' => 25, 'id_cluster_skill' => 13],
            ['id_pertanyaan' => 26, 'id_cluster_skill' => 13],

            // Mengelola Produk / Proyek IT
            ['id_pertanyaan' => 27, 'id_cluster_skill' => 14],
            ['id_pertanyaan' => 28, 'id_cluster_skill' => 14],

            // Konsultan
            ['id_pertanyaan' => 29, 'id_cluster_skill' => 15],
            ['id_pertanyaan' => 30, 'id_cluster_skill' => 15],

        ]);
    }
}