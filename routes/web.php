<?php

use App\Http\Controllers\CetakController;
use App\Http\Controllers\DapurController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProsesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/lokasi/{latitude}/{longitude}', [LokasiController::class, 'index'])->name('lokasi');
Route::POST('/lokasi/posting', [LokasiController::class, 'posting'])->name('pos_lokasi');
Route::get('/', [LandingController::class, 'index'])->name('index');
Route::get('/login', [LandingController::class, 'login'])->name('login');
Route::post('/login/proses', [LandingController::class, 'login_proses'])->name('pos_login');

Route::POST('/scan_meja', [PelangganController::class, 'scan_meja'])->name('scan_meja');
Route::post('/scan_meja/proses', [PelangganController::class, 'scan_meja_proses'])->name('pos_scan_meja');
Route::get('/pelanggan/{nomor_meja}', [PelangganController::class, 'pelanggan'])->name('pelanggan');
Route::post('/pelanggan/proses', [PelangganController::class, 'pelanggan_proses'])->name('pos_pelanggan');

Route::get('/menu/{nomor_meja}', [PelangganController::class, 'menu'])->name('menu');
Route::POST('/menu/{nomor_meja}/konfirmasi', [PelangganController::class, 'menu_konfirmasi'])->name('pesan_menu');
Route::POST('/menu/{nomor_meja}/konfirmasi_menu/{pembayaran}', [PelangganController::class, 'menu_konfirmasi_cek'])->name('hal_konfirmasi');
Route::POST('/menu/{nomor_meja}/konfirmasi_akhir', [PelangganController::class, 'konfirmasi_pesanan'])->name('konfirmasi_pesanan');
Route::get('/menu/{id}/{nomor_meja}/atur_jumlah', [PelangganController::class, 'atur_jumlah'])->name('ubah_jumlah');
Route::POST('/menu/{nomor_meja}/atur_jumlah_proses', [PelangganController::class, 'atur_jumlah_proses'])->name('ubah_jumlah_proses');
Route::get('/menu/{id}/{nomor_meja}/list_order', [PelangganController::class, 'list_order'])->name('list_order');
Route::get('/menu/{id}/{nomor_meja}/hapus_pesanan', [PelangganController::class, 'hapus_pesanan'])->name('batal_pesan');

Route::group(['middleware' => ['auth', 'cekakses:1']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/menu_makanan', [DashboardController::class, 'menu_makanan'])->name('menu_makanan');
    Route::get('/menu_makanan_form/{jenis}', [DashboardController::class, 'menu_makanan_form'])->name('add_menu');
    Route::POST('/menu_makanan_form/proses', [ProsesController::class, 'proses_menu'])->name('proses_menu');
    Route::get('/menu_makanan_form/edit/{id}', [ProsesController::class, 'edit_menu'])->name('edit_makanan');
    Route::POST('/menu_makanan_form/edit/proses/{id}', [ProsesController::class, 'edit_menu_proses'])->name('proses_edit_menu');
    Route::get('/menu_makanan/hapus_makanan/{id}', [ProsesController::class, 'hapus_makanan'])->name('hapus_makanan');

    Route::get('/menu_minuman', [DashboardController::class, 'menu_minuman'])->name('menu_minuman');
    Route::get('/menu_minuman/hapus_minuman/{id}', [ProsesController::class, 'hapus_minuman'])->name('hapus_minuman');

    Route::get('/meja', [DashboardController::class, 'meja'])->name('meja');
    Route::POST('/meja/proses', [ProsesController::class, 'tambah_meja'])->name('tambah_meja');
    Route::get('/meja/edit/{id}', [ProsesController::class, 'edit_meja'])->name('edit_meja');
    Route::POST('/meja/edit/{id}/proses', [ProsesController::class, 'proses_edit_meja'])->name('proses_edit_meja');
    Route::get('/meja/hapus/{id}', [ProsesController::class, 'hapus_meja'])->name('hapus_meja');
    Route::get('/meja/cetak_qr_meja/{id}', [CetakController::class, 'cetak_qr_meja'])->name('cetak_qr_meja');
    Route::get('/meja/cetak_seluruh_qr', [CetakController::class, 'cetak_seluruh_qr'])->name('cetak_seluruh_qr');

    Route::get('/dapur', [DashboardController::class, 'dapur'])->name('dapur');
    Route::get('dapur/add', [ProsesController::class, 'add_dapur'])->name('add_dapur');
    Route::POST('dapur/proses_dapur', [ProsesController::class, 'proses_dapur'])->name('proses_dapur');

    Route::get('/pegawai', [DashboardController::class, 'pegawai'])->name('pegawai');
    Route::get('/pegawai/form', [DashboardController::class, 'add_pegawai'])->name('add_pegawai');
    Route::POST('/pegawai/proses_pegawai', [ProsesController::class, 'proses_pegawai'])->name('proses_pegawai');
    Route::get('/pegawai/edit/{id}', [ProsesController::class, 'edit_pegawai'])->name('edit_pegawai');
    Route::POST('/pegawai/edit/{id}/proses', [ProsesController::class, 'proses_edit_pegawai'])->name('proses_edit_pegawai');
    Route::get('/pegawai/delete/{id}', [ProsesController::class, 'hapus_pegawai'])->name('hapus_pegawai');
    Route::get('/pegawai/reset/{id}', [ProsesController::class, 'reset_password'])->name('reset_password');

    Route::get('/laporan_admin', [DapurController::class, 'laporan'])->name('laporan_dapur_admin');
    Route::POST('/laporan_filter_admin', [DapurController::class, 'laporan_filter'])->name('filter_laporan_admin');
    Route::POST('/laporan_cetak_admin', [DapurController::class, 'laporan_cetak'])->name('cetak_laporan_admin');

    Route::get('/laporan_transaksi_admin', [KasirController::class, 'laporan_transaksi'])->name('laporan_transaksi_admin');
    Route::get('/laporan_transaksi/{kode}/cetak_ulang_admin', [KasirController::class, 'cetak_ulang'])->name('cetak_ulang_admin');
    Route::POST('/laporan/filter_transaksi_admin', [KasirController::class, 'filter_transaksi'])->name('filter_transaksi_admin');
    Route::POST('/cetak_admin', [KasirController::class, 'cetak_transaksi'])->name('cetak_transaksi_admin');

    Route::get('/logout', [LandingController::class, 'logout'])->name('logout');
});
Route::group(['middleware' => ['auth', 'cekakses:2']], function () {
    Route::get('/dashboard_dapur', [DapurController::class, 'index'])->name('dashboard_dapur');

    Route::get('/proses_pesanan/{id}/{kode_pembayaran}/proses', [DapurController::class, 'proses_pesanan'])->name('proses_update_pesanan');
    Route::get('/proses_antar_pesanan/{id}/{kode_pembayaran}/proses', [DapurController::class, 'proses_antar_pesanan'])->name('proses_antar_pesanan');

    Route::get('/laporan', [DapurController::class, 'laporan'])->name('laporan_dapur');
    Route::POST('/laporan_filter', [DapurController::class, 'laporan_filter'])->name('filter_laporan');
    Route::POST('/laporan_cetak', [DapurController::class, 'laporan_cetak'])->name('cetak_laporan');

    Route::get('/logout', [LandingController::class, 'logout'])->name('logout');
});
Route::group(['middleware' => ['auth', 'cekakses:3']], function () {
    Route::get('/dashboard_kasir', [KasirController::class, 'index'])->name('dashboard_kasir');

    Route::get('/tampilkan_pesanan/{id}/{nomor}', [KasirController::class, 'tampilkan_pesanan'])->name('tampilkan_pesanan_pelanggan');
    Route::get('/pembayaran/{jumlah}/{kode_pembayaran}', [KasirController::class, 'proses_pembayaran'])->name('proses_pembayaran');
    Route::POST('/input_pembayaran/{kode_pembayaran}', [KasirController::class, 'input_pembayaran'])->name('input_pembayaran');
    Route::get('/laporan_transaksi', [KasirController::class, 'laporan_transaksi'])->name('laporan_transaksi');

    Route::get('/laporan_transaksi/{kode}/cetak_ulang', [KasirController::class, 'cetak_ulang'])->name('cetak_ulang');
    Route::POST('/laporan/filter_transaksi', [KasirController::class, 'filter_transaksi'])->name('filter_transaksi');
    Route::POST('/cetak', [KasirController::class, 'cetak_transaksi'])->name('cetak_transaksi');

    Route::get('/logout', [LandingController::class, 'logout'])->name('logout');
});

Route::get('/profil', [DashboardController::class, 'profil'])->name('profile');
Route::POST('/profil/pos_update_profil', [DashboardController::class, 'pos_update_profil'])->name('update_profil');
Route::get('/profil/setting_password/{id}', [DashboardController::class, 'setting_password'])->name('setting_password');
Route::patch('/profil/pos_update_password', [LandingController::class, 'pos_update_password'])->name('update_password');
