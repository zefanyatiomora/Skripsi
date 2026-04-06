<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cluster_skill', function (Blueprint $table) {
            $table->id('id_cluster_skill');

            // Foreign key ke area_fungsi
            $table->unsignedBigInteger('id_area_fungsi');

            $table->string('nama_cluster');
            $table->timestamps();

            // Relasi
            $table->foreign('id_area_fungsi')
                  ->references('id_area_fungsi')
                  ->on('area_fungsi')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cluster_skill');
    }
};
