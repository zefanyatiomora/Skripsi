<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClusterSkillSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cluster_skill')->insert([

            [
                'id_cluster_skill' => 1,
                'id_domain' => 1,
                'nama_cluster' => 'Frontend & UI Development',
                'deskripsi' => 'Berfokus pada pengembangan antarmuka pengguna (UI), pengalaman pengguna (UX), serta implementasi tampilan aplikasi web dan sistem berbasis client-side.'
            ],

            [
                'id_cluster_skill' => 2,
                'id_domain' => 1,
                'nama_cluster' => 'Backend & API Development',
                'deskripsi' => 'Berfokus pada pengembangan logika bisnis, layanan backend, API, integrasi sistem, keamanan aplikasi, dan pengelolaan server-side.'
            ],

            [
                'id_cluster_skill' => 3,
                'id_domain' => 1,
                'nama_cluster' => 'Web & Software Engineering',
                'deskripsi' => 'Berfokus pada pengembangan aplikasi web, rekayasa perangkat lunak, desain sistem, implementasi solusi perangkat lunak, dan pengelolaan siklus hidup software.'
            ],

            [
                'id_cluster_skill' => 4,
                'id_domain' => 1,
                'nama_cluster' => 'Mobile Development',
                'deskripsi' => 'Berfokus pada perancangan, pengembangan, pengujian, dan pemeliharaan aplikasi berbasis perangkat mobile seperti Android dan iOS.'
            ],

            [
                'id_cluster_skill' => 5,
                'id_domain' => 2,
                'nama_cluster' => 'Data, ERP & Information Management',
                'deskripsi' => 'Berfokus pada pengelolaan data, basis data, sistem informasi, business intelligence, serta implementasi dan pengelolaan sistem ERP.'
            ],

            [
                'id_cluster_skill' => 6,
                'id_domain' => 2,
                'nama_cluster' => 'Analysis & Consulting',
                'deskripsi' => 'Berfokus pada analisis kebutuhan bisnis dan sistem, perancangan solusi teknologi, konsultasi TI, serta pengambilan keputusan berbasis data.'
            ],

            [
                'id_cluster_skill' => 7,
                'id_domain' => 3,
                'nama_cluster' => 'Infrastructure & Technical Support',
                'deskripsi' => 'Berfokus pada pengelolaan infrastruktur TI, sistem komputer, jaringan, operasional layanan teknologi informasi, dan dukungan teknis.'
            ],

            [
                'id_cluster_skill' => 8,
                'id_domain' => 3,
                'nama_cluster' => 'Quality Assurance & Multimedia',
                'deskripsi' => 'Berfokus pada penjaminan kualitas perangkat lunak melalui pengujian, quality control, serta pengembangan dan pengelolaan teknologi multimedia.'
            ],

            [
                'id_cluster_skill' => 9,
                'id_domain' => 4,
                'nama_cluster' => 'Governance, Risk & Security',
                'deskripsi' => 'Berfokus pada tata kelola TI, audit sistem informasi, manajemen risiko, keamanan informasi, perlindungan data pribadi, dan kepatuhan regulasi.'
            ],

            [
                'id_cluster_skill' => 10,
                'id_domain' => 4,
                'nama_cluster' => 'Architecture & Product Management',
                'deskripsi' => 'Berfokus pada perancangan arsitektur bisnis dan teknologi, manajemen produk digital, strategi organisasi, serta penerapan metodologi Agile dan Scrum.'
            ],

        ]);
    }
}