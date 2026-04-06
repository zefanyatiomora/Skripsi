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

            // Web Development (1)
            [
                'id_cluster_skill' => 1,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0610',
                'nama_okupasi' => 'Frontend Developer',
                'deskripsi' => 'Mengembangkan tampilan antarmuka pengguna (UI) pada aplikasi web.'
            ],
            [
                'id_cluster_skill' => 1,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0609',
                'nama_okupasi' => 'Backend Developer',
                'deskripsi' => 'Mengembangkan logika server, database, dan API.'
            ],
            [
                'id_cluster_skill' => 1,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0604',
                'nama_okupasi' => 'Web Developer',
                'deskripsi' => 'Mengembangkan aplikasi web secara keseluruhan (frontend & backend).'
            ],

            // Mobile Development (2)
            [
                'id_cluster_skill' => 2,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0612',
                'nama_okupasi' => 'Mobile Computing Supervisor',
                'deskripsi' => 'Mengelola pengembangan sistem mobile computing.'
            ],
            [
                'id_cluster_skill' => 2,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0611',
                'nama_okupasi' => 'Mobile Programmer Supervisor',
                'deskripsi' => 'Mengawasi tim pengembang aplikasi mobile.'
            ],

            // Software Engineering (3)
            [
                'id_cluster_skill' => 3,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0615',
                'nama_okupasi' => 'Software System Developer',
                'deskripsi' => 'Mengembangkan sistem perangkat lunak.'
            ],
            [
                'id_cluster_skill' => 3,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0601',
                'nama_okupasi' => 'Programmer Supervisor',
                'deskripsi' => 'Mengelola tim programmer.'
            ],
            [
                'id_cluster_skill' => 3,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0606',
                'nama_okupasi' => 'Systems Programmer Supervisor',
                'deskripsi' => 'Mengawasi pengembangan sistem tingkat rendah.'
            ],
            [
                'id_cluster_skill' => 3,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0605',
                'nama_okupasi' => 'Application Programmer Supervisor',
                'deskripsi' => 'Mengelola pengembangan aplikasi.'
            ],

            // Data & Database (4)
            [
                'id_cluster_skill' => 4,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0603',
                'nama_okupasi' => 'Database Programmer',
                'deskripsi' => 'Mengelola dan mengembangkan database.'
            ],
            [
                'id_cluster_skill' => 4,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0616',
                'nama_okupasi' => 'Information Supervisor',
                'deskripsi' => 'Mengelola sistem informasi organisasi.'
            ],

            // Analysis & Business (5)
            [
                'id_cluster_skill' => 5,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0613',
                'nama_okupasi' => 'System Analyst',
                'deskripsi' => 'Menganalisis kebutuhan sistem.'
            ],
            [
                'id_cluster_skill' => 5,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0607',
                'nama_okupasi' => 'Business Analyst',
                'deskripsi' => 'Menganalisis kebutuhan bisnis.'
            ],
            [
                'id_cluster_skill' => 5,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0602',
                'nama_okupasi' => 'Program Analyst',
                'deskripsi' => 'Menganalisis program dan sistem.'
            ],

            // Infrastructure (6)
            [
                'id_cluster_skill' => 6,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0614',
                'nama_okupasi' => 'IT Support Supervisor',
                'deskripsi' => 'Mengelola layanan dukungan IT.'
            ],

            // ERP (7)
            [
                'id_cluster_skill' => 7,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0618',
                'nama_okupasi' => 'ERP Officer',
                'deskripsi' => 'Mengelola sistem ERP.'
            ],
            [
                'id_cluster_skill' => 7,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0619',
                'nama_okupasi' => 'ERP SME',
                'deskripsi' => 'Ahli dalam implementasi ERP.'
            ],

            // QA (8)
            [
                'id_cluster_skill' => 8,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0608',
                'nama_okupasi' => 'Software QA Analyst',
                'deskripsi' => 'Melakukan pengujian kualitas software.'
            ],

            // Multimedia (9)
            [
                'id_cluster_skill' => 9,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0617',
                'nama_okupasi' => 'Multimedia Technical Supervisor',
                'deskripsi' => 'Mengelola teknologi multimedia.'
            ],

            // Security (10)
            [
                'id_cluster_skill' => 10,
                'id_area_fungsi' => 2,
                'kode_okupasi' => 'TIK.DEV0620',
                'nama_okupasi' => 'Privacy by Design Operator',
                'deskripsi' => 'Mengimplementasikan privasi dalam desain sistem.'
            ],

            // ======================
            // AREA 1 - ITG
            // ======================

            [
                'id_cluster_skill' => 11,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0607',
                'nama_okupasi' => 'IT Audit Supervisor',
                'deskripsi' => 'Mengawasi audit TI.'
            ],
            [
                'id_cluster_skill' => 11,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0606',
                'nama_okupasi' => 'IT Auditor',
                'deskripsi' => 'Melakukan audit sistem TI.'
            ],
            [
                'id_cluster_skill' => 12,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0608',
                'nama_okupasi' => 'PDP Risk Analyst',
                'deskripsi' => 'Menganalisis risiko perlindungan data pribadi.'
            ],
            [
                'id_cluster_skill' => 13,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0603',
                'nama_okupasi' => 'Enterprise Architect',
                'deskripsi' => 'Merancang arsitektur enterprise.'
            ],
            [
                'id_cluster_skill' => 13,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0604',
                'nama_okupasi' => 'Technology Architect',
                'deskripsi' => 'Merancang arsitektur teknologi.'
            ],
            [
                'id_cluster_skill' => 14,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0601',
                'nama_okupasi' => 'Scrum Master',
                'deskripsi' => 'Memfasilitasi tim agile.'
            ],
            [
                'id_cluster_skill' => 14,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0602',
                'nama_okupasi' => 'Product Owner',
                'deskripsi' => 'Mengelola backlog produk.'
            ],
            [
                'id_cluster_skill' => 15,
                'id_area_fungsi' => 1,
                'kode_okupasi' => 'TIK.ITG0605',
                'nama_okupasi' => 'IT Consultant',
                'deskripsi' => 'Memberikan konsultasi TI.'
            ],

        ]);
    }
}