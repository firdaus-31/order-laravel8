<?php

namespace App\Http\Controllers;

use App\Models\ListModel;
use App\Models\MejaModel;
use App\Models\Orderan;
use App\Models\TransaksiModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;

class KasirController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->name);
        $meja = MejaModel::all();
        return view('kasir.home', compact('meja'));
    }

    public function tampilkan_pesanan($id, $nomor)
    {
        $pilih_meja = MejaModel::where('id_meja', $id)->first();
        // dd($pilih_meja);
        $orderan = ListModel::where('kode_pembayaran', $pilih_meja->kode_pembayaran)->first();
        $pesanan = Orderan::with('menu')->where('kode_pembayaran', $pilih_meja->kode_pembayaran)->groupBy('id_menu')->get();
        $nomor_meja = $nomor;
        // dd($pesanan);

        return view('kasir.pesanan', compact('pesanan', 'nomor_meja', 'pilih_meja', 'orderan'));
    }

    public function proses_pembayaran($jumlah, $kode_pembayaran)
    {
        $orderan = ListModel::where('kode_pembayaran', $kode_pembayaran)->first();
        $jumlah = $jumlah;
        $kode_pembayaran = $kode_pembayaran;
        $meja = MejaModel::where('kode_pembayaran', $kode_pembayaran)->first();

        // dd($meja);

        return view('kasir.proses_pembayaran', compact('jumlah', 'kode_pembayaran', 'orderan', 'meja'));
    }

    public function input_pembayaran(Request $request, $kode_pembayaran)
    {
        TransaksiModel::create([
            'kode_pembayaran' => $kode_pembayaran,
            'kode_meja' => $request->meja,
            'pelanggan' => $request->nama_pelanggan,
            'total_harga' => $request->total_harga,
            'diterima' => $request->uang_diterima,
            'kembalian' => $request->uang_kembalian,
        ]);
        ListModel::where('kode_pembayaran', $kode_pembayaran)->update(['status_pesanan' => '1']);

        MejaModel::where('kode_pembayaran', $kode_pembayaran)->update([
            'status_meja' => '0',
            'pelanggan' => NULL,
            'kode_pembayaran' => NULL,
        ]);

        $konfirmasi = TransaksiModel::where('kode_pembayaran', $kode_pembayaran)->first();
        $pesanan = Orderan::with('menu')->where('kode_pembayaran', $kode_pembayaran)->groupBy('id_menu')->get();
        $proses = "pertama";

        return view('kasir.konfirmasi', compact('konfirmasi', 'pesanan', 'proses'));
    }

    public function laporan_transaksi()
    {
        $transaksi = TransaksiModel::orderBy('kode_pembayaran')->get();
        if (Auth::user()->akses == 3) {
            return view('kasir.laporan_transaksi', compact('transaksi'));
        } else {
            return view('kasir.laporan_transaksi_admin', compact('transaksi'));
        }
    }

    public function cetak_ulang($kode)
    {
        $konfirmasi = TransaksiModel::where('kode_pembayaran', $kode)->first();
        $pesanan = Orderan::with('menu')->where('kode_pembayaran', $kode)->groupBy('id_menu')->get();
        $proses = "ulang";

        if (Auth::user()->akses == 3) {
            return view('kasir.konfirmasi', compact('konfirmasi', 'pesanan', 'proses'));
        } else {
            return view('kasir.konfirmasi_admin', compact('konfirmasi', 'pesanan', 'proses'));
        }
    }

    public function filter_transaksi(Request $request)
    {
        // dd($request->all());
        $start_date = Carbon::parse($request->mulai)
            ->toDateTimeString();

        $end_date = Carbon::parse($request->selesai)
            ->toDateTimeString();
        $transaksi = TransaksiModel::whereBetween('created_at', [$start_date, $end_date])->orderBy('kode_pembayaran')->get();
        $mulai = $request->mulai;
        $selesai = $request->selesai;

        if (Auth::user()->akses == 3) {
            return view('kasir.laporan_transaksi', compact('transaksi', 'mulai', 'selesai'));
        } else {
            return view('kasir.laporan_transaksi_admin', compact('transaksi', 'mulai', 'selesai'));
        }
    }

    public function cetak_transaksi(Request $request)
    {
        $start_date = Carbon::parse($request->mulai)
            ->toDateTimeString();

        $end_date = Carbon::parse($request->selesai)
            ->toDateTimeString();
        $transaksi = TransaksiModel::whereBetween('created_at', [$start_date, $end_date])->orderBy('kode_pembayaran')->get();
        $mulai = $request->mulai;
        $selesai = $request->selesai;

        if (Auth::user()->akses == 3) {
            return view('cetak.laporan_transaksi', compact('transaksi', 'mulai', 'selesai'));
        } else {
            return view('cetak.laporan_transaksi', compact('transaksi', 'mulai', 'selesai'));
        }
    }
}
