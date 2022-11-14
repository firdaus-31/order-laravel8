<?php

namespace App\Http\Controllers;

use App\Models\MejaModel;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function cetak_seluruh_qr()
    {
        $meja = MejaModel::all();
        return view('cetak.cetak_seluruh_qr', compact('meja'));
    }

    public function cetak_qr_meja($id)
    {
        $meja = MejaModel::where('id_meja', $id)->first();
        return view('cetak.cetak_qr_meja', compact('meja'));
    }
}
