<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use App\Models\LokasiModel;

class LokasiController extends Controller
{
    public function posting (Request $request)
    {
        LokasiModel::where('id_lokasi','3')->update(['longitude' => $request->longitude, 'latitude' => $request->latitude]);
        
        return redirect()->back();
    }
}
