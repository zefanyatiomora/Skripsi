<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScreeningMappingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('screening_mapping')->insert([

            // Cluster 1
            ['id_pertanyaan' => 1, 'id_cluster_skill' => 1],
            ['id_pertanyaan' => 2, 'id_cluster_skill' => 1],
            ['id_pertanyaan' => 3, 'id_cluster_skill' => 1],
            ['id_pertanyaan' => 4, 'id_cluster_skill' => 1],

            // Cluster 2
            ['id_pertanyaan' => 5, 'id_cluster_skill' => 2],
            ['id_pertanyaan' => 6, 'id_cluster_skill' => 2],
            ['id_pertanyaan' => 7, 'id_cluster_skill' => 2],
            ['id_pertanyaan' => 8, 'id_cluster_skill' => 2],

            // Cluster 3
            ['id_pertanyaan' => 9, 'id_cluster_skill' => 3],
            ['id_pertanyaan' => 10, 'id_cluster_skill' => 3],
            ['id_pertanyaan' => 11, 'id_cluster_skill' => 3],
            ['id_pertanyaan' => 12, 'id_cluster_skill' => 3],

            // Cluster 4
            ['id_pertanyaan' => 13, 'id_cluster_skill' => 4],
            ['id_pertanyaan' => 14, 'id_cluster_skill' => 4],
            ['id_pertanyaan' => 15, 'id_cluster_skill' => 4],
            ['id_pertanyaan' => 16, 'id_cluster_skill' => 4],

            // Cluster 5
            ['id_pertanyaan' => 17, 'id_cluster_skill' => 5],
            ['id_pertanyaan' => 18, 'id_cluster_skill' => 5],
            ['id_pertanyaan' => 19, 'id_cluster_skill' => 5],
            ['id_pertanyaan' => 20, 'id_cluster_skill' => 5],

            // Cluster 6
            ['id_pertanyaan' => 21, 'id_cluster_skill' => 6],
            ['id_pertanyaan' => 22, 'id_cluster_skill' => 6],
            ['id_pertanyaan' => 23, 'id_cluster_skill' => 6],
            ['id_pertanyaan' => 24, 'id_cluster_skill' => 6],

            // Cluster 7
            ['id_pertanyaan' => 25, 'id_cluster_skill' => 7],
            ['id_pertanyaan' => 26, 'id_cluster_skill' => 7],
            ['id_pertanyaan' => 27, 'id_cluster_skill' => 7],
            ['id_pertanyaan' => 28, 'id_cluster_skill' => 7],

            // Cluster 8
            ['id_pertanyaan' => 29, 'id_cluster_skill' => 8],
            ['id_pertanyaan' => 30, 'id_cluster_skill' => 8],
            ['id_pertanyaan' => 31, 'id_cluster_skill' => 8],
            ['id_pertanyaan' => 32, 'id_cluster_skill' => 8],

            // Cluster 9
            ['id_pertanyaan' => 33, 'id_cluster_skill' => 9],
            ['id_pertanyaan' => 34, 'id_cluster_skill' => 9],
            ['id_pertanyaan' => 35, 'id_cluster_skill' => 9],
            ['id_pertanyaan' => 36, 'id_cluster_skill' => 9],

            // Cluster 10
            ['id_pertanyaan' => 37, 'id_cluster_skill' => 10],
            ['id_pertanyaan' => 38, 'id_cluster_skill' => 10],
            ['id_pertanyaan' => 39, 'id_cluster_skill' => 10],
            ['id_pertanyaan' => 40, 'id_cluster_skill' => 10],
        ]);
    }
}