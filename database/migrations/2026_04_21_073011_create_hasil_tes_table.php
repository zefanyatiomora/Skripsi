<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('hasil_tes', function (Blueprint $table) {
        $table->id('id_hasil');
        $table->unsignedBigInteger('id_pengguna');
        $table->unsignedBigInteger('id_cluster_skill');
        $table->timestamp('tanggal_tes')->useCurrent();
        $table->timestamps();
        $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
        $table->foreign('id_cluster_skill')->references('id_cluster_skill')->on('cluster_skill')->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_tes');
    }
};
