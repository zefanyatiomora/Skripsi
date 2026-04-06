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
        Schema::create('okupasi_kompetensi', function (Blueprint $table) {
            $table->id('id_okupasi_kompetensi');
            $table->unsignedBigInteger('id_okupasi');
            $table->unsignedBigInteger('id_kompetensi');

            // Foreign Key (optional tapi disarankan)
            $table->foreign('id_okupasi')->references('id_okupasi')->on('okupasi')->onDelete('cascade');
            $table->foreign('id_kompetensi')->references('id_kompetensi')->on('kompetensi')->onDelete('cascade');

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('okupasi_kompetensi');
    }
};
