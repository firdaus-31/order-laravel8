<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = ['urutan_pesanan', 'tanggal', 'kode_pembayaran', 'nama_konsumen', 'id_menu', 'id_dapur', 'jumlah', 'status_pesanan', 'status_menu'];

    public function menu()
    {
        return $this->belongsTo(MenuModel::class, 'id_menu');
    }
}
