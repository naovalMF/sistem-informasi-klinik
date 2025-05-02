<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai'; // Nama tabel sesuai database
    protected $fillable = ['nama', 'jabatan']; // Sesuaikan dengan kolom di tabel
}
