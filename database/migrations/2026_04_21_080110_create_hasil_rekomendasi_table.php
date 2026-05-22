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
    Schema::create('hasil_rekomendasi', function (Blueprint $table) {
        $table->id('id_hasil_rekomendasi');
        $table->unsignedBigInteger('id_hasil');
        $table->unsignedBigInteger('id_okupasi');
        $table->float('skor'); // hasil SAW
        $table->timestamps();
        $table->foreign('id_hasil')->references('id_hasil')->on('hasil_tes')->onDelete('cascade');
        $table->foreign('id_okupasi')->references('id_okupasi')->on('okupasi')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_rekomendasi');
    }
};
