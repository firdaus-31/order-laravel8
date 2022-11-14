<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ListModel;
use App\Models\MejaModel;
use App\Models\MenuModel;
use App\Models\LokasiModel;
use App\Models\Orderan;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class PelangganController extends Controller
{
    public function scan_meja(Request $request)
    {
        // dd($request->all());
        // $lokasi = LokasiModel::where('id_lokasi', '3')->first();
        
        $lon = $request->longitude;
        $lat = $request->latitude;
           
        $lokasi= LokasiModel::select("lokasi.id_lokasi"
                ,DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(lokasi.latitude)) 
                * cos(radians(lokasi.longitude) - radians(" . $lon . ")) 
                + sin(radians(" .$lat. ")) 
                * sin(radians(lokasi.latitude))) AS radius"))
                ->groupBy("lokasi.id_lokasi")
                ->first();
        $format = $lokasi;
        // dd($format);
        
        if ($lokasi->radius < 7) {
            return view('pelanggan.scan_meja');
        } else {
            return view('pelanggan.diluar_jangkauan');
        }
        
    }

    public function scan_meja_proses(Request $request)
    {
        // dd($request->all());
        $cek = MejaModel::where('nomor_meja', $request->nomer_meja)->first();

        if ($cek->status_meja == 0) {
            return redirect()->route('pelanggan', $request->nomer_meja);
        } else {
            return redirect()->route('menu', $request->nomer_meja);
        }
    }

    public function pelanggan($id)
    {
        $nomer = $id;
        return view('pelanggan.pelanggan_form', compact('nomer'));
    }

    public function pelanggan_proses(Request $request)
    {
        $urutan = ListModel::max('kode_pembayaran');
        $no = $urutan;

        $no_urut = (int) substr($no, 0, 3);
        $no_urut++;
        $urutan_pembayaran = sprintf("%03s", $no_urut);

        $kode_urutan = $urutan_pembayaran;

        MejaModel::where('nomor_meja', $request->nomor_meja)->update([
            'status_meja' => 1,
            'pelanggan' => $request->nama_pelanggan,
            'kode_pembayaran' => $kode_urutan
        ]);

        ListModel::create([
            'kode_pembayaran' => $kode_urutan,
            'nomor_meja' => $request->nomor_meja,
            'pelanggan' => $request->nama_pelanggan,
            'status_pesanan' => '0'
        ]);
        return redirect()->route('menu', $request->nomor_meja);
    }

    public function menu($nomor_meja)
    {
        $makanan = MenuModel::where('jenis', 1)->get();
        $minuman = MenuModel::where('jenis', 2)->get();
        $nomor_meja = $nomor_meja;
        $meja = MejaModel::where('nomor_meja', $nomor_meja)->first();
        $list = ListModel::where('nomor_meja', $nomor_meja)->first();

        return view('pelanggan.menu', compact('makanan', 'minuman', 'nomor_meja', 'meja', 'list'));
    }

    public function list_order($id, $nomor_meja)
    {
        $pesanan = Orderan::with('menu')->where('kode_pembayaran', $id)->get();
        return view('pelanggan.menu_konfirmasi', compact('pesanan', 'nomor_meja'));
    }

    public function menu_konfirmasi(Request $request, $nomor_meja)
    {
        // dd($request->all());
        $inputan = $request->id_menu;
        $jumlah = $request->jumlah_menu;
        $id_dapur = $request->id_dapur;

        foreach ($inputan as $k => $i) {
            if ($jumlah[$k] == 0) {
            } else {
                $input = Orderan::create([
                    'kode_pembayaran' => $request->kode_pembayaran,
                    'nama_konsumen' => $request->nama_konsumen,
                    'id_menu' => $i,
                    'id_dapur' => $id_dapur[$k],
                    'jumlah' => $jumlah[$k],
                    'status_pesanan' => '0',
                    'status_menu' => '0',
                ]);
            }
        }
        $pesanan = Orderan::with('menu')->where('kode_pembayaran', $request->kode_pembayaran)->get();
        return view('pelanggan.menu_konfirmasi', compact('pesanan', 'nomor_meja'));
    }

    public function konfirmasi_pesanan(Request $request, $nomor_meja)
    {
        // dd($request->all());
        $urutan = Orderan::max('urutan_pesanan');
        $no = $urutan;

        $no_urut = (int) substr($no, 2, 3);
        $no_urut++;
        $urutan_pembayaran = "PS" . sprintf("%03s", $no_urut);

        $kode_urutan = $urutan_pembayaran;

        Orderan::where('kode_pembayaran', $request->kode_pembayaran)->where('urutan_pesanan', NULL)->update([
            'urutan_pesanan' => $kode_urutan,
            'status_menu' => '1',
        ]);

        $kode_pembayaran = MejaModel::where('nomor_meja', $nomor_meja)->first();

        // dd($kode_pembayaran->kode_pembayaran);

        $pesanan = Orderan::with('menu')->where('status_pesanan', '0')->where('kode_pembayaran', $kode_pembayaran->kode_pembayaran)->get();
        return view('pelanggan.menu_konfirmasi', compact('pesanan', 'nomor_meja'));
    }

    public function atur_jumlah($id, $nomor_meja)
    {
        $pesanan = Orderan::with('menu')->where('id_pesanan', $id)->first();
        // dd($pesanan->nama_konsumen);
        $nomor_meja = $nomor_meja;
        return view('pelanggan.atur_jumlah', compact('pesanan', 'nomor_meja'));
    }

    public function atur_jumlah_proses(Request $request)
    {
        Orderan::where('id_pesanan', $request->id_pesanan)->update([
            'nama_konsumen' => $request->nama_konsumen,
            'jumlah' => $request->jumlah,
        ]);

        $pesanan = Orderan::with('menu')->where('kode_pembayaran', $request->kode_pembayaran)->get();
        // dd($pesanan);
        $nomor_meja = $request->nomor_meja;
        return view('pelanggan.menu_konfirmasi', compact('pesanan', 'nomor_meja'));
    }

    public function hapus_pesanan($id, $nomor_meja)
    {
        Orderan::where('id_pesanan', $id)->delete();
        
        $meja = MejaModel::where('nomor_meja',$nomor_meja)->first();
        
        // dd($meja->kode_pembayaran);
        return redirect()->route('list_order',[$meja->kode_pembayaran,$nomor_meja]);
    }
}
