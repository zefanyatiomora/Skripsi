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
        Schema::create('area_fungsi', function (Blueprint $table) {
            $table->id('id_area_fungsi');
            $table->string('kode_area_fungsi')->unique();
            $table->string('nama_area_fungsi');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_fungsi');
    }
};
