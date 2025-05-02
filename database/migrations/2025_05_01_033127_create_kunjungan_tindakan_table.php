<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjunganTindakanTable extends Migration
{
    public function up(): void
    {
        Schema::create('kunjungan_tindakan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kunjungan_id');
            $table->unsignedBigInteger('tindakan_id');
            $table->timestamps();

            $table->foreign('kunjungan_id')->references('id')->on('kunjungans')->onDelete('cascade');
            $table->foreign('tindakan_id')->references('id')->on('tindakans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kunjungan_tindakan');
    }
}
