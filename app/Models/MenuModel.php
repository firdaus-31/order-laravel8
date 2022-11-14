<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $fillable = ['nama_menu', 'jenis', 'harga', 'foto_menu'];

    public function orderan()
    {
        return $this->hasMany(Orderan::class);
    }
}
