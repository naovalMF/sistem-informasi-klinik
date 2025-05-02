<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = 'wilayah'; // Pastikan nama tabel sesuai dengan di database
    protected $fillable = ['nama']; // Tambahkan kolom lain jika ada
}
