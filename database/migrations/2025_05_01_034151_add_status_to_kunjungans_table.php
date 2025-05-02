<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kunjungans', function (Blueprint $table) {
            $table->enum('status_pembayaran', ['belum', 'sudah'])->default('belum');
        });
    }

    public function down(): void
    {
        Schema::table('kunjungan', function (Blueprint $table) {
            $table->dropColumn('status_pembayaran');
        });
    }
};
