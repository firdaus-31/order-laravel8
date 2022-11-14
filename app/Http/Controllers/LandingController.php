<?php

namespace App\Http\Controllers;

use App\Http\Requests\UbahPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function login()
    {
        return view('login.index');
    }

    public function login_proses(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // dd(Auth::attempt($credentials);

        if (Auth::attempt($credentials)) {
            // echo "berhasil";
            // dd(Auth::user()->akses);
            $request->session()->regenerate();
            if (Auth::user()->akses == '1') {
                return redirect()->intended('/dashboard');
            } elseif (Auth::user()->akses == '2') {
                return redirect()->intended('/dashboard_dapur');
            } elseif (Auth::user()->akses == '3') {
                return redirect()->intended('/dashboard_kasir');
            } else {
                return redirect('login')->with('LoginError', 'Gagal Login!');
            }
        } else {
            return redirect('login')->with('LoginError', 'Gagal Login!');
        }
    }

    public function pos_update_password(UbahPassword $request)
    {
        // dd($request->all());
        User::where('id', Auth::user()->id)->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('logout');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('login');
    }
}
