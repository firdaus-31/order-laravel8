<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DapurModel extends Model
{
    use HasFactory;
    protected $table = 'dapur';
    protected $primaryKey = 'id_dapur';
    protected $fillable = ['nama_dapur', 'kepala_koki'];
}
