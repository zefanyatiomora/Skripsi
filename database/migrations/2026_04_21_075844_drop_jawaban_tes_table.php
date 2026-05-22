<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::dropIfExists('jawaban_tes');
    }

    public function down(): void
    {
        Schema::create('jawaban_tes', function (Blueprint $table) {
            $table->id('id_jawaban');
            $table->unsignedBigInteger('id_hasil');
            $table->unsignedBigInteger('id_kompetensi');
            $table->boolean('nilai');
            $table->timestamps();
        });
    }
};