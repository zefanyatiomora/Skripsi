<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClusterSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cluster_skill')->insert([
            [
                'id_cluster_skill' => 1,
                'id_area_fungsi' => 2, 
                'nama_cluster' => 'Web Development'
            ],
            [
                'id_cluster_skill' => 2,
                'id_area_fungsi' => 2,
                'nama_cluster' => 'Mobile Development'
            ],
            [
                'id_cluster_skill' => 3,
                'id_area_fungsi' => 2,
                'nama_cluster' => 'Software Engineering'
            ],
            [
               'id_cluster_skill' => 4,
                'id_area_fungsi' => 2,
                'nama_cluster' => 'Data & Database'
            ],
            [
               'id_cluster_skill' => 5,
                'id_area_fungsi' => 2,
                'nama_cluster' => 'Analysis & Business'
            ],
            [
               'id_cluster_skill' => 6,
                'id_area_fungsi' => 2,
                'nama_cluster' => 'Infrastructure / Support'
            ],
            [
               'id_cluster_skill' => 7,
                'id_area_fungsi' => 2,
                'nama_cluster' => 'ERP & Enterprise System'
            ],
            [
                'id_cluster_skill' => 8,
                'id_area_fungsi' => 2, 
                'nama_cluster' => 'Quality Assurance'
            ],
            [
                'id_cluster_skill' => 9,
                'id_area_fungsi' => 2, 
                'nama_cluster' => 'Multimedia Technology'
            ],
            [
                'id_cluster_skill' => 10,
                'id_area_fungsi' => 2, 
                'nama_cluster' => 'Security / Privacy Engineering'
            ],
            [
                'id_cluster_skill' => 11,
                'id_area_fungsi' => 1, 
                'nama_cluster' => 'Audit'
            ],
            [
                'id_cluster_skill' => 12,
                'id_area_fungsi' => 1, 
                'nama_cluster' => 'Perlindungan Data Pribadi'
            ],
            [
                'id_cluster_skill' => 13,
                'id_area_fungsi' => 1, 
                'nama_cluster' => 'Arsitektur sistem atau teknologi'
            ],
            [
                'id_cluster_skill' => 14,
                'id_area_fungsi' => 1, 
                'nama_cluster' => 'Mengelola produk atau proyek IT'
            ],
            [
                'id_cluster_skill' => 15,
                'id_area_fungsi' => 1, 
                'nama_cluster' => 'Konsultan'
           ],
        ]);
    }
}
