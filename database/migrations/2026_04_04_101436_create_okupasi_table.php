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
        Schema::create('okupasi', function (Blueprint $table) {
            $table->id('id_okupasi');

            // Foreign key ke cluster_skill
            $table->unsignedBigInteger('id_cluster_skill');

            // Foreign key ke area_fungsi
            $table->unsignedBigInteger('id_area_fungsi');

            $table->string('nama_okupasi');
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            // Relasi ke cluster_skill
            $table->foreign('id_cluster_skill')
                  ->references('id_cluster_skill')
                  ->on('cluster_skill')
                  ->onDelete('cascade');

            // Relasi ke area_fungsi
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
        Schema::dropIfExists('okupasi');
    }
};
