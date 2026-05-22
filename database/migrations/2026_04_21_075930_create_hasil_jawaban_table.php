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
    Schema::create('hasil_jawaban', function (Blueprint $table) {
        $table->id('id_jawaban');
        $table->unsignedBigInteger('id_hasil');
        $table->unsignedBigInteger('id_kompetensi');
        $table->boolean('nilai'); // 1 = mampu, 0 = tidak
        $table->timestamps();
        $table->foreign('id_hasil')->references('id_hasil')->on('hasil_tes')->onDelete('cascade');
        $table->foreign('id_kompetensi')->references('id_kompetensi')->on('kompetensi')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_jawaban');
    }
};
