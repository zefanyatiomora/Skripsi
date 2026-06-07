<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OkupasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('okupasi')->insert([

            // ======================
            // AREA 2 - DEV
            // ======================

            [
                'id_cluster_skill' => 1, // Frontend & UI Development
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0610',
                'nama_okupasi' => 'Frontend Developer',
                'deskripsi' => 'Orang profesional yang bertanggung jawab untuk mengembangkan tampilan dan nuansa website atau aplikasi. Mereka menggunakan keterampilan desain, coding, analisis, dan debugging untuk membangun sisi klien dari suatu website.'
            ],

            [
                'id_cluster_skill' => 2, // Backend & API Development
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0609',
                'nama_okupasi' => 'Backend Developer',
                'deskripsi' => 'Orang profesional IT yang bertanggung jawab untuk mengembangkan dan memelihara logika bisnis dan sistem back-end dari sebuah aplikasi atau situs web. Mereka menggunakan berbagai bahasa pemrograman, framework, dan teknologi untuk membangun sistem yang aman, efisien, dan andal.'
            ],

            [
                'id_cluster_skill' => 3, // Fullstack & Web Development
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0604',
                'nama_okupasi' => 'Web Developer',
                'deskripsi' => 'Orang yang memiliki kemampuan untuk merancang, mengembangkan, dan memelihara situs web dan aplikasi web.'
            ],

            [
                'id_cluster_skill' => 4,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0612',
                'nama_okupasi' => 'Mobile Computing Supervisor',
                'deskripsi' => 'Orang yang bertanggung jawab untuk mengembangkan, menguji, dan memelihara aplikasi mobile tingkat lanjut.'
            ],

            [
                'id_cluster_skill' => 4,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0611',
                'nama_okupasi' => 'Mobile Programmer Supervisor',
                'deskripsi' => 'Orang yang memiliki kemampuan untuk merancang, mengembangkan, menguji, dan memelihara aplikasi mobile.'
            ],

            [
                'id_cluster_skill' => 3,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0615',
                'nama_okupasi' => 'Software System Developer',
                'deskripsi' => 'Orang profesional yang bertanggung jawab untuk merancang, membangun, dan memelihara sistem perangkat lunak.'
            ],

            [
                'id_cluster_skill' => 3,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0601',
                'nama_okupasi' => 'Programmer Supervisor',
                'deskripsi' => 'Orang yang memimpin tim pemrogram dalam pengembangan dan implementasi aplikasi perangkat lunak.'
            ],

            [
                'id_cluster_skill' => 7,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0606',
                'nama_okupasi' => 'Systems Programmer Supervisor',
                'deskripsi' => 'Orang yang bertanggung jawab untuk mengembangkan, memelihara, dan mengoperasikan sistem komputer.'
            ],

            [
                'id_cluster_skill' => 2,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0605',
                'nama_okupasi' => 'Application Programmer Supervisor',
                'deskripsi' => 'Orang yang memimpin tim pemrogram aplikasi dalam pengembangan dan implementasi software.'
            ],

            [
                'id_cluster_skill' => 5,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0603',
                'nama_okupasi' => 'Database Programmer',
                'deskripsi' => 'Orang yang bertanggung jawab untuk mengembangkan dan mengelola basis data.'
            ],

            [
                'id_cluster_skill' => 5,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0616',
                'nama_okupasi' => 'Information Supervisor',
                'deskripsi' => 'Orang profesional yang mengelola informasi, sistem informasi, serta kebijakan dan dukungan teknis terkait informasi.'
            ],

            [
                'id_cluster_skill' => 6,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0613',
                'nama_okupasi' => 'System Analyst',
                'deskripsi' => 'Profesional yang menganalisis, merancang, dan mengimplementasikan sistem informasi serta menjembatani kebutuhan bisnis dan teknologi.'
            ],

            [
                'id_cluster_skill' => 6,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0607',
                'nama_okupasi' => 'Business Analyst',
                'deskripsi' => 'Orang yang menjembatani kebutuhan bisnis dan teknologi serta mengembangkan solusi yang sesuai.'
            ],

            [
                'id_cluster_skill' => 6,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0602',
                'nama_okupasi' => 'Program Analyst',
                'deskripsi' => 'Orang yang menganalisis kebutuhan bisnis dan membuat spesifikasi untuk aplikasi perangkat lunak.'
            ],

            [
                'id_cluster_skill' => 7,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0614',
                'nama_okupasi' => 'IT Support Supervisor',
                'deskripsi' => 'Orang yang bertanggung jawab memberikan dukungan teknis kepada pengguna perangkat keras dan perangkat lunak.'
            ],

            [
                'id_cluster_skill' => 5,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0618',
                'nama_okupasi' => 'ERP Officer',
                'deskripsi' => 'Orang yang bertanggung jawab untuk mengembangkan, mengimplementasikan, dan memelihara sistem ERP.'
            ],

            [
                'id_cluster_skill' => 5,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0619',
                'nama_okupasi' => 'ERP SME',
                'deskripsi' => 'Ahli yang bertanggung jawab mengelola proses bisnis dalam sistem ERP.'
            ],

            [
                'id_cluster_skill' => 8,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0608',
                'nama_okupasi' => 'Software QA Analyst',
                'deskripsi' => 'Orang yang memastikan kualitas perangkat lunak melalui pengujian dan identifikasi bug.'
            ],

            [
                'id_cluster_skill' => 8,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0617',
                'nama_okupasi' => 'Multimedia Technical Supervisor',
                'deskripsi' => 'Orang yang melakukan riset dan pengembangan teknologi multimedia.'
            ],

            [
                'id_cluster_skill' => 9,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.DEV0620',
                'nama_okupasi' => 'Privacy by Design Operator',
                'deskripsi' => 'Orang yang memastikan sistem dan aplikasi memenuhi prinsip perlindungan data pribadi (PDP).'
            ],

            [
                'id_cluster_skill' => 9,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0607',
                'nama_okupasi' => 'IT Audit Supervisor',
                'deskripsi' => 'Orang yang mengelola dan mengawasi proses audit teknologi informasi.'
            ],

            [
                'id_cluster_skill' => 9,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0606',
                'nama_okupasi' => 'IT Auditor',
                'deskripsi' => 'Orang yang melakukan audit sistem teknologi informasi dan analisis kontrol serta risiko.'
            ],

            [
                'id_cluster_skill' => 9,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0608',
                'nama_okupasi' => 'PDP Risk Analyst',
                'deskripsi' => 'Orang yang bertanggung jawab melakukan analisis risiko perlindungan data pribadi.'
            ],

            [
                'id_cluster_skill' => 10,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0603',
                'nama_okupasi' => 'Enterprise Architect',
                'deskripsi' => 'Orang yang merancang arsitektur enterprise organisasi.'
            ],

            [
                'id_cluster_skill' => 10,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0604',
                'nama_okupasi' => 'Technology Architect',
                'deskripsi' => 'Orang yang merancang arsitektur teknologi dalam organisasi.'
            ],

            [
                'id_cluster_skill' => 10,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0601',
                'nama_okupasi' => 'Scrum Master',
                'deskripsi' => 'Orang yang memfasilitasi tim agile menggunakan metode Scrum.'
            ],

            [
                'id_cluster_skill' => 10,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0602',
                'nama_okupasi' => 'Product Owner',
                'deskripsi' => 'Orang yang mengelola backlog produk dan menentukan prioritas pengembangan.'
            ],

            [
                'id_cluster_skill' => 6,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0605',
                'nama_okupasi' => 'IT Consultant',
                'deskripsi' => 'Orang yang memberikan konsultasi terkait solusi teknologi informasi.'
            ],

        ]);
    }
}
