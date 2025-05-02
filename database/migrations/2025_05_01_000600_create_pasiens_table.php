<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_ktp')->unique();
            $table->string('alamat');
            $table->string('telepon');
            $table->unsignedBigInteger('wilayah_id');
            $table->timestamps();

            $table->foreign('wilayah_id')->references('id')->on('wilayah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
