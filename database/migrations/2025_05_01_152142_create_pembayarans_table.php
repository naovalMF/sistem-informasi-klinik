<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kunjungan_id');
            $table->decimal('total', 12, 2);
            $table->string('metode_pembayaran')->nullable();
            $table->timestamp('tanggal_bayar')->nullable();
            $table->timestamps();

            $table->foreign('kunjungan_id')->references('id')->on('kunjungans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
}
