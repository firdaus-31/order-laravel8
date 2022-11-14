<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Orderan;
use Faker\Provider\File;
use App\Models\MejaModel;
use App\Models\MenuModel;
use App\Models\DapurModel;
use App\Models\PegawaiModel;
use App\Models\LokasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Stevebauman\Location\Facades\Location;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $judul = 'Dashboard';
        $jumlah_makanan = MenuModel::where('jenis', '1')->count();
        $jumlah_minuman = MenuModel::where('jenis', '2')->count();
        $jumlah_pesanan = Orderan::where('status_pesanan', '0')->groupBy('kode_pembayaran')->count();
        $jumlah_meja = MejaModel::count();
        $ip = $request->ip();
        $userinfo = Location::get($ip);
        // dd($userinfo);
        return view('dashboard.index', compact('judul', 'jumlah_makanan', 'jumlah_minuman', 'jumlah_pesanan', 'jumlah_meja','userinfo'));
    }

    public function menu_makanan()
    {
        $judul = 'List Menu';
        $makanan = MenuModel::where('jenis', '1')->get();
        $dapur = DapurModel::all();
        return view('dashboard.menu_makanan', compact('judul', 'makanan', 'dapur'));
    }

    public function menu_makanan_form($jenis)
    {
        $jenis_menu = $jenis;
        $dapur = DapurModel::all();
        return view('dashboard.makanan.form_menu', compact('jenis_menu', 'dapur'));
    }

    public function menu_minuman()
    {
        $minuman = MenuModel::where('jenis', '2')->get();
        $dapur = DapurModel::all();
        return view('dashboard.menu_minuman', compact('minuman', 'dapur'));
    }

    public function meja()
    {
        $meja = MejaModel::all();
        return view('dashboard.meja', compact('meja'));
    }

    public function pegawai()
    {
        $pegawai = PegawaiModel::all();
        $user = User::all();
        return view('dashboard.pegawai', compact('pegawai', 'user'));
    }
    public function add_pegawai()
    {
        return view('dashboard.pegawai.form_pegawai');
    }

    public function dapur()
    {
        $dapur = DapurModel::all();
        $pegawai = PegawaiModel::all();
        return view('dashboard.dapur', compact('dapur', 'pegawai'));
    }

    public function profil()
    {
        $pegawai = PegawaiModel::where('email', Auth::user()->username)->first();
        // dd($pegawai->foto);
        if (Auth::user()->akses == '1') {
            return view('dashboard.profil', compact('pegawai'));
        } elseif (Auth::user()->akses == '3') {
            return view('kasir.profil', compact('pegawai'));
        } elseif (Auth::user()->akses == '2') {
            return view('dapur.profil', compact('pegawai'));
        }
    }

    public function pos_update_profil(Request $request)
    {
        // dd($request->all());
        $res = $request->file('foto');

        if ($res == null) {
            PegawaiModel::where('id_pegawai', $request->id_pegawai)->update([
                'nama_pegawai' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'tanggal_lahir' => $request->tanggal_lahir,
            ]);
        } else {
            $ext = $res->getClientOriginalExtension();
            $nama = $request->nama_pegawai;
            $nbar = $nama;
            $tsp = str_replace(" ", "", $nbar);
            $tsp1 = str_replace(".", "", $tsp);
            $tsp2 = str_replace(",", "", $tsp1);
            $res->move(\base_path() . "/public/foto_pegawai/", $tsp2 . '.' . $ext);

            $pos = $tsp2 . '.' . $ext;
            PegawaiModel::where('id_pegawai', $request->id_pegawai)->update([
                'nama_pegawai' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'tanggal_lahir' => $request->tanggal_lahir,
                'foto' => $pos,
            ]);
        }

        if (Auth::user()->username == $request->email) {
            return redirect()->route('profile')->with('success', 'Data Berhasil Diubah');
        } else {
            User::where('username', Auth::user()->username)->update([
                'username' => $request->email,
            ]);

            return redirect()->route('logout');
        }
    }

    public function setting_password($id)
    {
        if (Auth::user()->akses == '1') {
            return view('dashboard.reset_password');
        } elseif (Auth::user()->akses == '3') {
            return view('kasir.reset_password');
        } elseif (Auth::user()->akses == '2') {
            return view('dapur.reset_password');
        }
    }
}
