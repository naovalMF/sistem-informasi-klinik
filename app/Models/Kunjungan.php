<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kunjungan extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'tanggal', 'keterangan'];

    public function tindakans()
{
    return $this->belongsToMany(Tindakan::class, 'kunjungan_tindakan');
}

public function obats()
{
    return $this->belongsToMany(Obat::class, 'kunjungan_obat');
}
public function pembayaran()
{
    return $this->hasOne(Pembayaran::class);
}


}
