<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
      Schema::create('pendaftarans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('pasien_id')->constrained()->onDelete('cascade');
    $table->foreignId('pegawai_id')->constrained()->onDelete('cascade');
    $table->foreignId('tindakan_id')->constrained()->onDelete('cascade');
    $table->date('tanggal');
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
