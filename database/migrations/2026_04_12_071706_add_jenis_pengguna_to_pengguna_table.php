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
    Schema::table('pengguna', function (Blueprint $table) {
        $table->unsignedBigInteger('id_jenis_pengguna')->after('id_pengguna');

        $table->foreign('id_jenis_pengguna')
              ->references('id_jenis_pengguna')
              ->on('jenis_pengguna')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengguna', function (Blueprint $table) {
            //
        });
    }
};
