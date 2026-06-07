<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cluster_skill', function (Blueprint $table) {

            // Hapus foreign key terlebih dahulu
            $table->dropForeign(['id_area_fungsi']);

            // Baru hapus kolom
            $table->dropColumn('id_area_fungsi');
        });
    }

    public function down(): void
    {
        Schema::table('cluster_skill', function (Blueprint $table) {

            $table->unsignedBigInteger('id_area_fungsi');

            $table->foreign('id_area_fungsi')
                  ->references('id_area_fungsi')
                  ->on('area_fungsi')
                  ->onDelete('cascade');
        });
    }
};