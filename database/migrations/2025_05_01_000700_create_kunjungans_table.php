<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            // Tambahkan kolom lain di sini sesuai kebutuhan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};
