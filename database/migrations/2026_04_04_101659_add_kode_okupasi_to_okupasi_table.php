<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('okupasi', function (Blueprint $table) {
            $table->string('kode_okupasi')->unique()->after('id_okupasi');
        });
    }

    public function down(): void
    {
        Schema::table('okupasi', function (Blueprint $table) {
            $table->dropColumn('kode_okupasi');
        });
    }
};