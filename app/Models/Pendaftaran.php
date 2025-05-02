<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'pegawai_id', 'tindakan_id', 'tanggal'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function tindakan()
    {
        return $this->belongsTo(Tindakan::class);
    }
}
