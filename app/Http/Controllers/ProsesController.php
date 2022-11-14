<?php

namespace App\Http\Controllers;

use App\Models\DapurModel;
use App\Models\MejaModel;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\PegawaiModel;
use App\Models\User;

class ProsesController extends Controller
{
    public function proses_menu(Request $request)
    {
        $res = $request->file('foto_makanan');
        $ext = $res->getClientOriginalExtension();
        $nama = $request->nama_menu;
        $nbar = $nama;
        $tsp = str_replace(" ", "", $nbar);
        $tsp1 = str_replace(".", "", $tsp);
        $tsp2 = str_replace(",", "", $tsp1);

        $res->move(\base_path()."/public/foto_makanan/", $tsp2 . '.' . $ext);

        $pos = $tsp2 . '.' . $ext;

        $simpan = new MenuModel();
        $simpan->nama_menu = $request->nama_menu;
        $simpan->jenis = $request->jenis;
        $simpan->harga = $request->harga;
        $simpan->id_dapur = $request->id_dapur;
        $simpan->foto_menu = $pos;
        $simpan->save();

        if($request->jenis == 1){
            return redirect()->route('menu_makanan')->with('success', 'Data berhasil ditambahkan');
        }else {
            return redirect()->route('menu_minuman')->with('success', 'Data berhasil ditambahkan');
        }
    }

    public function edit_menu($id)
    {
        $data = MenuModel::where('id_menu',$id)->first();
        $dapur = DapurModel::all();
        return view('dashboard.makanan.form_edit', compact('data','dapur'));
    }

    public function edit_menu_proses(Request $request,$id)
    {
        $res = $request->file('foto_makanan');

        if ($res == null) {
            MenuModel::where('id_menu',$id)->update([
                'nama_menu' => $request->nama_menu,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
                'id_dapur' => $request->id_dapur
            ]);
        }else {
            $cek = MenuModel::where('id_menu',$id)->first();
            $foto = public_path().'\foto_makanan/'.$cek->foto_menu;

            if (file_exists($foto)) {
                unlink($foto);
            }

            $ext = $res->getClientOriginalExtension();
            $nama = $request->nama_menu;
            $nbar = $nama;
            $tsp = str_replace(" ", "", $nbar);
            $tsp1 = str_replace(".", "", $tsp);
            $tsp2 = str_replace(",", "", $tsp1);

            $res->move(\base_path()."/public/foto_makanan/", $tsp2 . '.' . $ext);

            $pos = $tsp2 . '.' . $ext;

            MenuModel::where('id_menu',$id)->update([
                'nama_menu' => $request->nama_menu,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
                'id_dapur' => $request->id_dapur,
                'foto_menu' => $pos,
            ]);
        }

        if($request->jenis == 1){
            return redirect()->route('menu_makanan')->with('success', 'Data berhasil diubah');
        }else {
            return redirect()->route('menu_minuman')->with('success', 'Data berhasil diubah');
        }
    }

    public function hapus_makanan($id)
    {
        $cek = MenuModel::where('id_menu',$id)->first();
        $foto = public_path().'\foto_makanan/'.$cek->foto_menu;

        if (file_exists($foto)) {
            unlink($foto);
        }

        MenuModel::where('id_menu',$id)->delete();

        return redirect()->route('menu_makanan')->with('success', 'Data berhasil dihapus');
    }
    public function hapus_minuman($id)
    {
        $cek = MenuModel::where('id_menu',$id)->first();
        $foto = public_path().'\foto_makanan/'.$cek->foto_menu;

        if (file_exists($foto)) {
            unlink($foto);
        }

        MenuModel::where('id_menu',$id)->delete();

        return redirect()->route('menu_minuman')->with('success', 'Data berhasil dihapus');
    }

    public function tambah_meja(Request $request)
    {
        MejaModel::create($request->all());
        return redirect()->route('meja')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit_meja($id)
    {
        $data = MejaModel::where('id_meja',$id)->first();
        return view('dashboard.meja.form_edit', compact('data'));
    }

    public function proses_edit_meja(Request $request,$id)
    {
        MejaModel::where('id_meja',$id)->update([
            'nomor_meja' => $request->nomor_meja
        ]);
        return redirect()->route('meja')->with('success', 'Data berhasil diubah');
    }

    public function hapus_meja($id)
    {
        MejaModel::where('id_meja',$id)->delete();
        return redirect()->route('meja')->with('success', 'Data berhasil dihapus');
    }

    public function proses_pegawai(Request $request)
    {
        // dd($request->all());
        $res = $request->file('foto_pegawai');
        $ext = $res->getClientOriginalExtension();
        $nama = $request->nama_pegawai;
        $nbar = $nama;
        $tsp = str_replace(" ", "", $nbar);
        $tsp1 = str_replace(".", "", $tsp);
        $tsp2 = str_replace(",", "", $tsp1);

        $res->move(\base_path()."/public/foto_pegawai/", $tsp2 . '.' . $ext);

        $pos = $tsp2 . '.' . $ext;

        PegawaiModel::create([
            'nama_pegawai' => $request->nama_pegawai,
            'alamat' => $request->alamat,
            'email' => $request->email_pegawai,
            'tanggal_lahir' => $request->tanggal_lahir,
            'foto' => $pos,
        ]);

        $password = bcrypt('12345');
        
        User::create([
            'name' => $request->nama_pegawai,
            'username' => $request->email_pegawai,
            'password' => $password,
            'akses' => $request->akses,
        ]);

        return redirect()->route('pegawai')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit_pegawai($id)
    {
        $pegawai = PegawaiModel::where('id_pegawai',$id)->first();
        $user = User::where('username',$pegawai->email)->first();

        return view('dashboard.pegawai.form_edit', compact('pegawai','user'));
    }

    public function proses_edit_pegawai(Request $request,$id)
    {
        $res = $request->file('foto_pegawai');
        $cari = PegawaiModel::where('id_pegawai',$id)->first();
        // dd($cari);
        if ($res == null) {
            PegawaiModel::where('id_pegawai',$id)->update([
                'nama_pegawai' => $request->nama_pegawai,
                'alamat' => $request->alamat,
                'email' => $request->email_pegawai,
                'tanggal_lahir' => $request->tanggal_lahir,
            ]);

            User::where('username',$cari->email)->update([
                'name' => $request->nama_pegawai,
                'username' => $request->email_pegawai,
                'akses' => $request->akses,
            ]);
        }else {
            $cek = PegawaiModel::where('id_pegawai',$id)->first();
            $foto = public_path().'\foto_pegawai/'.$cek->foto;

            if (file_exists($foto)) {
                unlink($foto);
            }

            $ext = $res->getClientOriginalExtension();
            $nama = $request->nama_pegawai;
            $nbar = $nama;
            $tsp = str_replace(" ", "", $nbar);
            $tsp1 = str_replace(".", "", $tsp);
            $tsp2 = str_replace(",", "", $tsp1);

            $res->move(\base_path()."/public/foto_pegawai/", $tsp2 . '.' . $ext);


            $pos = $tsp2 . '.' . $ext;

            PegawaiModel::where('id_pegawai',$id)->update([
                'nama_pegawai' => $request->nama_pegawai,
                'alamat' => $request->alamat,
                'email' => $request->email_pegawai,
                'tanggal_lahir' => $request->tanggal_lahir,
                'foto' => $pos,
            ]);

            User::where('username',$cari->email)->update([
                'name' => $request->nama_pegawai,
                'username' => $request->email_pegawai,
                'akses' => $request->akses,
            ]);
        }

        return redirect()->route('pegawai')->with('success', 'Data berhasil diubah');
    }

    public function hapus_pegawai($id)
    {
        $cari = PegawaiModel::where('id_pegawai',$id)->first();
        $foto = public_path().'\foto_pegawai/'.$cari->foto;

        if (file_exists($foto)) {
            unlink($foto);
        }

        PegawaiModel::where('id_pegawai',$id)->delete();
        User::where('username',$cari->email)->delete();

        return redirect()->route('pegawai')->with('success', 'Data berhasil dihapus');
    }

    public function reset_password($id)
    {
        $cari = PegawaiModel::where('id_pegawai',$id)->first();
        $password = bcrypt('12345');
        User::where('username',$cari->email)->update([
            'password' => $password,
        ]);

        return redirect()->route('pegawai')->with('success', 'Password berhasil diubah');
    }

    public function add_dapur()
    {
        $user=User::where('akses','2')->get();
        $pegawai = PegawaiModel::all();
        return view('dashboard.dapur.form_add', compact('user','pegawai'));
    }

    public function proses_dapur(Request $request)
    {
        DapurModel::create([
            'nama_dapur' => $request->nama_dapur,
            'kepala_koki' => $request->kepala_koki
        ]);

        return redirect()->route('dapur')->with('success', 'Data berhasil ditambahkan');
    }
}
