<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = ['nama_pegawai', 'alamat','email','tanggal_lahir','foto'];
}
