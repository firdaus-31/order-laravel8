<?php

namespace App\Http\Controllers;

use App\Models\Orderan;
use Barryvdh\DomPDF\PDF;
use App\Models\MenuModel;
use App\Models\DapurModel;
use App\Models\PegawaiModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DapurController extends Controller
{
    public function index()
    {
        $pegawai = PegawaiModel::where('email', Auth::user()->username)->first();
        $dapur = DapurModel::where('kepala_koki', $pegawai->id_pegawai)->first();
        $menu = MenuModel::where('id_dapur', $dapur->id_dapur)->get();

        return view('dapur.home', compact('menu', 'dapur', 'pegawai'));
    }

    public function proses_pesanan($id, $kode_pembayaran)
    {
        $sekarang = date('Y-m-d');
        Orderan::where('id_pesanan', $id)->update(['status_pesanan' => '1', 'tanggal' => $sekarang]);

        return redirect()->route('dashboard_dapur');
    }

    public function proses_antar_pesanan($id, $kode_pembayaran)
    {
        $sekarang = date('Y-m-d');
        Orderan::where('id_pesanan', $id)->update(['status_pesanan' => '2', 'tanggal' => $sekarang]);

        return redirect()->back();
    }

    public function laporan()
    {
        if (Auth::user()->akses == 2) {
            $pegawai = PegawaiModel::where('email', Auth::user()->username)->first();
            $dapur = DapurModel::where('kepala_koki', $pegawai->id_pegawai)->first();
            $menu = Orderan::with('menu')->where('id_dapur', $dapur->id_dapur)->where('status_pesanan', '2')->groupBy('id_menu', 'tanggal')->get();
            return view('dapur.laporan', compact('menu', 'dapur', 'pegawai'));
        } else {
            $menu = Orderan::with('menu')->where('status_pesanan', '2')->groupBy('id_menu', 'tanggal')->get();
            return view('dapur.laporan_admin', compact('menu'));
        }
    }

    public function laporan_filter(Request $request)
    {
        if (Auth::user()->akses == 2) {
            $pegawai = PegawaiModel::where('email', Auth::user()->username)->first();
            $dapur = DapurModel::where('kepala_koki', $pegawai->id_pegawai)->first();
            $start_date = Carbon::parse($request->mulai)
                ->toDateTimeString();

            $end_date = Carbon::parse($request->akhir)
                ->toDateTimeString();

            $menu = Orderan::with('menu')->where('id_dapur', $dapur->id_dapur)->whereBetween('tanggal', [$start_date, $end_date])->where('status_pesanan', '2')->groupBy('id_menu', 'tanggal')->get();
            // $menu = MenuModel::where('id_dapur', $dapur->id_dapur)->get();
            $mulai = $request->mulai;
            $akhir = $request->akhir;

            return view('dapur.laporan', compact('menu', 'dapur', 'pegawai', 'mulai', 'akhir'));
        } else {
            $start_date = Carbon::parse($request->mulai)
                ->toDateTimeString();

            $end_date = Carbon::parse($request->akhir)
                ->toDateTimeString();

            $menu = Orderan::with('menu')->where('status_pesanan', '2')->whereBetween('tanggal', [$start_date, $end_date])->groupBy('id_menu', 'tanggal')->get();
            // $menu = MenuModel::where('id_dapur', $dapur->id_dapur)->get();
            $mulai = $request->mulai;
            $akhir = $request->akhir;
            return view('dapur.laporan_admin', compact('menu', 'mulai', 'akhir'));
        }
    }

    public function laporan_cetak(Request $request)
    {
        if (Auth::user()->akses == 2) {
            $pegawai = PegawaiModel::where('email', Auth::user()->username)->first();
            $dapur = DapurModel::where('kepala_koki', $pegawai->id_pegawai)->first();

            $start_date = Carbon::parse($request->mulai)
                ->toDateTimeString();

            $end_date = Carbon::parse($request->akhir)
                ->toDateTimeString();

            $menu = Orderan::with('menu')->where('status_pesanan', '2')->where('id_dapur', $dapur->id_dapur)->whereBetween('tanggal', [$start_date, $end_date])->groupBy('id_menu', 'tanggal')->get();

            $mulai = $request->mulai;
            $akhir = $request->akhir;

            return view('cetak.laporan_dapur', compact('menu', 'dapur', 'pegawai', 'mulai', 'akhir'));
        } else {
            $start_date = Carbon::parse($request->mulai)
                ->toDateTimeString();

            $end_date = Carbon::parse($request->akhir)
                ->toDateTimeString();

            $menu = Orderan::with('menu')->where('status_pesanan', '2')->whereBetween('tanggal', [$start_date, $end_date])->groupBy('id_menu', 'tanggal')->get();

            $mulai = $request->mulai;
            $akhir = $request->akhir;

            return view('cetak.laporan_dapur', compact('menu', 'mulai', 'akhir'));
        }
    }
}
