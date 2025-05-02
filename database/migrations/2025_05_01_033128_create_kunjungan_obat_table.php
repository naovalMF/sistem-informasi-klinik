<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kunjungan_obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kunjungan_id');
            $table->unsignedBigInteger('obat_id');
            $table->integer('jumlah'); // jumlah obat yang diberikan
            $table->integer('subtotal'); // total harga = jumlah * harga
            $table->timestamps();

            $table->foreign('kunjungan_id')->references('id')->on('kunjungans')->onDelete('cascade');
            $table->foreign('obat_id')->references('id')->on('obat')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kunjungan_obat');
    }
};
