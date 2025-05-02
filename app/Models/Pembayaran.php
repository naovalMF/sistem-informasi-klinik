namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = ['kunjungan_id', 'total', 'metode_pembayaran', 'tanggal_bayar'];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class);
    }
}
