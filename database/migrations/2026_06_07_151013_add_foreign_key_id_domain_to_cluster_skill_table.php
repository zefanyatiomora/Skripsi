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
    Schema::table('cluster_skill', function (Blueprint $table) {

        $table->unsignedBigInteger('id_domain')
              ->nullable()
              ->after('id_cluster_skill');

    });

    Schema::table('cluster_skill', function (Blueprint $table) {

        $table->foreign('id_domain')
              ->references('id_domain')
              ->on('domain')
              ->onDelete('cascade');

    });
}
};
