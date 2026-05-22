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
        Schema::create('screening_mapping', function (Blueprint $table) {

            $table->id('id_mapping');
            $table->unsignedBigInteger('id_pertanyaan');
            $table->unsignedBigInteger('id_cluster_skill');
            $table->timestamps();

            $table->foreign('id_pertanyaan')
                ->references('id_pertanyaan')
                ->on('screening_pertanyaan')
                ->onDelete('cascade');

            $table->foreign('id_cluster_skill')
                ->references('id_cluster_skill')
                ->on('cluster_skill')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('screening_mapping');
    }
};
