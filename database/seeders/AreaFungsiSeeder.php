<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaFungsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('area_fungsi')->insert([
            [
                'id_area_fungsi' => 1,
                'kode_area_fungsi' => 'ITG',
                'nama_area_fungsi' => 'Tata Kelola Teknologi Informasi (IT Governance)',
                'deskripsi' => 'Kelompok fungsi terkait pengelolaan, pengawasan, dan pengendalian teknologi informasi di tingkat organisasi secara menyeluruh. Melibatkan fungsi IT Governance & Management, IT Project Management, IT Enterprise Architecture, dan IT Consultancy.'
            ],
            [
                'id_area_fungsi' => 2,
                'kode_area_fungsi' => 'DEV',
                'nama_area_fungsi' => 'Pengembangan Produk Digital (Digital Product Development)',
                'deskripsi' => 'Kelompok fungsi terkait pengembangan produk teknologi informasi yang inovatif dan sesuai dengan kebutuhan pengguna. Mengintegrasikan fungsi Programming Software Development, Informatic System & Technology Development, Integration Application Systems, dan IT Multimedia.'
           ],
        ]);
    }
}
