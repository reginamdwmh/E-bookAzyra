<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterDataAlatController;
use App\Http\Controllers\LaporanDataAlatController;
use App\Http\Controllers\LaporanDataUmumController;
use App\Http\Controllers\MasterDataBahanController;
use App\Http\Controllers\LaporanDataBahanController;
use App\Http\Controllers\MasterDataMakananController;
use App\Http\Controllers\TransaksiAlatController;
use App\Http\Controllers\TransaksiUmumController;
use App\Http\Controllers\MasterDataKategoriController;
use App\Http\Controllers\TransaksiBahanController;
use App\Http\Controllers\MasterDataPemesananController;
use App\Http\Controllers\LaporanDataPemesananOnlineController;
use App\Http\Controllers\LaporanDataPenjualanMakananController;
use App\Http\Controllers\TransaksiPemesananOnlineController;
use App\Http\Controllers\TransaksiPenjualanMakananController;

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

Route::get('/', function () {
    return view('Login.index');
});

//Route aplikasi

Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'authenticate']);

Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/contact',[ContactController::class,'index']);

//Tabel Users
Route::get('/users',[UsersController::class,'index'])->name('index')->middleware('auth');;
Route::get('/users/tambah',[UsersController::class,'tambahusers'])->name('tambahusers')->middleware('auth');
Route::post('/users/simpan',[UsersController::class,'simpanusers'])->name('simpanusers')->middleware('auth');
Route::get('/users/ubah/{id}',[UsersController::class,'ubahusers'])->name('ubahusers')->middleware('auth');
Route::post('/users/update',[UsersController::class,'updateusers'])->name('updateusers')->middleware('auth');
Route::get('/users/hapus/{id}',[UsersController::class,'hapususers'])->name('hapususers')->middleware('auth');

//Tabel Kategori
Route::get('/master-data/data-kategori',[MasterDataKategoriController::class,'indexkategori'])->name('indexkategori')->middleware('auth');
Route::get('/master-data/data-kategori/tambah',[MasterDataKategoriController::class,'tambahkategori'])->name('tambahkategori')->middleware('auth');
Route::post('/master-data/data-kategori/simpan',[MasterDataKategoriController::class,'simpankategori'])->name('simpankategori')->middleware('auth');
Route::get('/master-data/data-kategori/ubah/{id_kategori}',[MasterDataKategoriController::class,'ubahkategori'])->name('ubahkategori')->middleware('auth');
Route::post('/master-data/data-kategori/update',[MasterDataKategoriController::class,'updatekategori'])->name('updatekategori')->middleware('auth');
Route::get('/master-data/data-kategori/hapus/{id_kategori}',[MasterDataKategoriController::class,'hapuskategori'])->name('hapuskategori')->middleware('auth');
// Route::get('/master-data/data-kategori/lihat/{id_kategori}',[MasterDataKategoriController::class,'lihatkategori'])->name('lihatkategori')->middleware('auth');

//Tabel Makanan
Route::get('/master-data/data-makanan',[MasterDataMakananController::class,'indexmakanan'])->name('indexmakanan')->middleware('auth');
Route::get('/master-data/data-makanan/tambah',[MasterDataMakananController::class,'tambahmakanan'])->name('tambahmakanan')->middleware('auth');
Route::post('/master-data/data-makanan/simpan',[MasterDataMakananController::class,'simpanmakanan'])->name('simpanmakanan')->middleware('auth');
Route::get('/master-data/data-makanan/ubah/{id_makanan}',[MasterDataMakananController::class,'ubahmakanan'])->name('ubahmakanan')->middleware('auth');
Route::post('/master-data/data-makanan/update',[MasterDataMakananController::class,'updatemakanan'])->name('updatemakanan')->middleware('auth');
Route::get('/master-data/data-makanan/hapus/{id_makanan}',[MasterDataMakananController::class,'hapusmakanan'])->name('hapusmakanan')->middleware('auth');
// Route::get('/master-data/data-makanan/lihat/{id_makanan}',[MasterDataMakananController::class,'lihatmakanan'])->name('lihatmakanan')->middleware('auth');

//Tabel Bahan
Route::get('/master-data/data-bahan',[MasterDataBahanController::class,'indexbahan'])->name('indexbahan')->middleware('auth');
Route::get('/master-data/data-bahan/tambah',[MasterDataBahanController::class,'tambahbahan'])->name('tambahbahan')->middleware('auth');
Route::post('/master-data/data-bahan/simpan',[MasterDataBahanController::class,'simpanbahan'])->name('simpanbahan')->middleware('auth');
Route::get('/master-data/data-bahan/ubah/{id_bahan}',[MasterDataBahanController::class,'ubahbahan'])->name('ubahbahan')->middleware('auth');
Route::post('/master-data/data-bahan/update',[MasterDataBahanController::class,'updatebahan'])->name('updatebahan')->middleware('auth');
Route::get('/master-data/data-bahan/hapus/{id_bahan}',[MasterDataBahanController::class,'hapusbahan'])->name('hapusbahan')->middleware('auth');
// Route::get('/master-data/data-bahan/lihat/{id_bahan}',[MasterDataBahanController::class,'lihatbahan'])->name('lihatbahan')->middleware('auth');


//Tabel Alat
Route::get('/master-data/data-alat',[MasterDataAlatController::class,'indexalat'])->name('indexalat')->middleware('auth');
Route::get('/master-data/data-alat/tambah',[MasterDataAlatController::class,'tambahalat'])->name('tambahalat')->middleware('auth');
Route::post('/master-data/data-alat/simpan',[MasterDataAlatController::class,'simpanalat'])->name('simpanalat')->middleware('auth');
Route::get('/master-data/data-alat/ubah/{id_alat}',[MasterDataAlatController::class,'ubahalat'])->name('ubahalat')->middleware('auth');
Route::post('/master-data/data-alat/update',[MasterDataAlatController::class,'updatealat'])->name('updatealat')->middleware('auth');
Route::get('/master-data/data-alat/hapus/{id_alat}',[MasterDataAlatController::class,'hapusalat'])->name('hapusalat')->middleware('auth');
// Route::get('/master-data/data-alat/lihat/{id_alat}',[MasterDataAlatController::class,'lihatalat'])->name('lihatalat')->middleware('auth');


//Tabel Pemesanan
Route::get('/master-data/data-pemesanan',[MasterDataPemesananController::class,'indexpemesanan'])->name('indexpemesanan')->middleware('auth');
Route::get('/master-data/data-pemesanan/tambah',[MasterDataPemesananController::class,'tambahpemesanan'])->name('tambahpemesanan')->middleware('auth');
Route::post('/master-data/data-pemesanan/simpan',[MasterDataPemesananController::class,'simpanpemesanan'])->name('simpanpemesanan')->middleware('auth');
Route::get('/master-data/data-pemesanan/ubah/{id_pemesanan}',[MasterDataPemesananController::class,'ubahpemesanan'])->name('ubahpemesanan')->middleware('auth');
Route::post('/master-data/data-pemesanan/update',[MasterDataPemesananController::class,'updatepemesanan'])->name('updatepemesanan')->middleware('auth');
Route::get('/master-data/data-pemesanan/hapus/{id_pemesanan}',[MasterDataPemesananController::class,'hapuspemesanan'])->name('hapuspemesanan')->middleware('auth');
// Route::get('/master-data/data-pemesanan/lihat/{id_pemesanan}',[MasterDataPemesananController::class,'lihatpemesanan'])->name('lihatpemesanan')->middleware('auth');




//Tabel Transaksi Alat
Route::get('/transaksi/data-alat',[TransaksiAlatController::class,'indextransaksialat'])->name('indextransaksialat')->middleware('auth');
Route::get('/transaksi/data-alat/tambah',[TransaksiAlatController::class,'tambahtransaksialat'])->name('tambahtransaksialat')->middleware('auth');
Route::post('/transaksi/data-alat/simpan',[TransaksiAlatController::class,'simpantransaksialat'])->name('simpantransaksialat')->middleware('auth');
Route::get('/transaksi/data-alat/ubah/{id_transaksialat}',[TransaksiAlatController::class,'ubahtransaksialat'])->name('ubahtransaksialat')->middleware('auth');
Route::post('/transaksi/data-alat/update',[TransaksiAlatController::class,'updatetransaksialat'])->name('updatetransaksialat')->middleware('auth');
Route::get('/transaksi/data-alat/hapus/{id_transaksialat}',[TransaksiAlatController::class,'hapustransaksialat'])->name('hapustransaksialat')->middleware('auth');
// Route::get('/transaksi/data-alat/lihat/{id_transaksialat}',[TransaksiAlatController::class,'lihattransaksialat'])->name('lihattransaksialat')->middleware('auth');




//Tabel Transaksi Bahan
Route::get('/transaksi/data-bahan',[TransaksiBahanController::class,'indextransaksibahan'])->name('indextransaksibahan')->middleware('auth');
Route::get('/transaksi/data-bahan/tambah',[TransaksiBahanController::class,'tambahtransaksibahan'])->name('tambahtransaksibahan')->middleware('auth');
Route::post('/transaksi/data-bahan/simpan',[TransaksiBahanController::class,'simpantransaksibahan'])->name('simpantransaksibahan')->middleware('auth');
Route::get('/transaksi/data-bahan/ubah/{id_transaksibahan}',[TransaksiBahanController::class,'ubahtransaksibahan'])->name('ubahtransaksibahan')->middleware('auth');
Route::post('/transaksi/data-bahan/update',[TransaksiBahanController::class,'updatetransaksibahan'])->name('updatetransaksibahan')->middleware('auth');
Route::get('/transaksi/data-bahan/hapus/{id_transaksibahan}',[TransaksiBahanController::class,'hapustransaksibahan'])->name('hapustransaksibahan')->middleware('auth');
// Route::get('/transaksi/data-bahan/lihat/{id_transaksibahan}',[TransaksiBahanController::class,'lihattransaksibahan'])->name('lihattransaksibahan')->middleware('auth');


//Tabel Transaksi Penjualan Makanan
Route::get('/transaksi/data-penjualan-makanan',[TransaksiPenjualanMakananController::class,'indexpenjualanmakanan'])->name('indexpenjualanmakanan')->middleware('auth');
Route::get('/transaksi/data-penjualan-makanan/tambah',[TransaksiPenjualanMakananController::class,'tambahpenjualanmakanan'])->name('tambahpenjualanmakanan')->middleware('auth');
Route::post('/transaksi/data-penjualan-makanan/simpan',[TransaksiPenjualanMakananController::class,'simpanpenjualanmakanan'])->name('simpanpenjualanmakanan')->middleware('auth');
Route::get('/transaksi/data-penjualan-makanan/ubah/{id_penjualan}',[TransaksiPenjualanMakananController::class,'ubahpenjualanmakanan'])->name('ubahpenjualanmakanan')->middleware('auth');
Route::post('/transaksi/data-penjualan-makanan/update',[TransaksiPenjualanMakananController::class,'updatepenjualanmakanan'])->name('updatepenjualanmakanan')->middleware('auth');
Route::get('/transaksi/data-penjualan-makanan/hapus/{id_penjualan}',[TransaksiPenjualanMakananController::class,'hapuspenjualanmakanan'])->name('hapuspenjualanmakanan')->middleware('auth');
// Route::get('/transaksi/data-penjualan-makanan/lihat/{id_penjualan}',[TransaksiPenjualanMakananController::class,'lihatpenjualanmakanan'])->name('lihatpenjualanmakanan')->middleware('auth');



//Tabel Transaksi Pemesanan Online
Route::get('/transaksi/data-pemesanan-online',[TransaksiPemesananOnlineController::class,'indexpemesananonline'])->name('indexpemesananonline')->middleware('auth');;
Route::get('/transaksi/data-pemesanan-online/tambah',[TransaksiPemesananOnlineController::class,'tambahpemesananonline'])->name('tambahpemesananonline')->middleware('auth');
Route::post('/transaksi/data-pemesanan-online/simpan',[TransaksiPemesananOnlineController::class,'simpanpemesananonline'])->name('simpanpemesananonline')->middleware('auth');
Route::get('/transaksi/data-pemesanan-online/ubah/{id_online}',[TransaksiPemesananOnlineController::class,'ubahpemesananonline'])->name('ubahpemesananonline')->middleware('auth');
Route::post('/transaksi/data-pemesanan-online/update',[TransaksiPemesananOnlineController::class,'updatepemesananonline'])->name('updatepemesananonline')->middleware('auth');
Route::get('/transaksi/data-pemesanan-online/hapus/{id_online}',[TransaksiPemesananOnlineController::class,'hapuspemesananonline'])->name('hapuspemesananonline')->middleware('auth');
Route::get('/transaksi/data-pemesanan-online/lihat/{id_online}',[TransaksiPemesananOnlineController::class,'lihatpemesananonline'])->name('lihatpemesananonline')->middleware('auth');


//Tabel Transaksi Umum
Route::get('/transaksi/data-umum',[TransaksiUmumController::class,'indextransaksiumum'])->name('indextransaksiumum')->middleware('auth');;
Route::get('/transaksi/data-umum/tambah',[TransaksiUmumController::class,'tambahtransaksiumum'])->name('tambahtransaksiumum')->middleware('auth');
Route::post('/transaksi/data-umum/simpan',[TransaksiUmumController::class,'simpantransaksiumum'])->name('simpantransaksiumum')->middleware('auth');
Route::get('/transaksi/data-umum/ubah/{id_umum}',[TransaksiUmumController::class,'ubahtransaksiumum'])->name('ubahtransaksiumum')->middleware('auth');
Route::post('/transaksi/data-umum/update',[TransaksiUmumController::class,'updatetransaksiumum'])->name('updatetransaksiumum')->middleware('auth');
Route::get('/transaksi/data-umum/hapus/{id_umum}',[TransaksiUmumController::class,'hapustransaksiumum'])->name('hapustransaksiumum')->middleware('auth');
// Route::get('/transaksi/data-umum/lihat/{id_umum}',[TransaksiUmumController::class,'lihattransaksiumum'])->name('lihattransaksiumum')->middleware('auth');


// Tabel Laporan Alat
Route::get('/laporan/data-alat',[LaporanDataAlatController::class,'indexlaporanalat'])->name('indexlaporanalat')->middleware('auth');
Route::get('/laporan/data-alat/cetak/{tglawal}/{tglakhir}',[LaporanDataAlatController::class,'cetaklaporantransaksialat'])->name('cetaklaporantransaksialat')->middleware('auth');




// Tabel Laporan Bahan
Route::get('/laporan/data-bahan',[LaporanDataBahanController::class,'indexlaporanbahan'])->name('indexlaporanbahan')->middleware('auth');
Route::get('/laporan/data-bahan/cetak/{tglawal}/{tglakhir}',[LaporanDataBahanController::class,'cetaklaporantransaksibahan'])->name('cetaklaporantransaksibahan')->middleware('auth');

// Tabel Laporan Penjualan Makanan
Route::get('/laporan/data-penjualan-makanan',[LaporanDataPenjualanMakananController::class,'indexlaporanpenjualanmakanan'])->name('indexlaporanpenjualanmakanan')->middleware('auth');
Route::get('/laporan/data-penjualan-makanan/cetak/{tglawal}/{tglakhir}',[LaporanDataPenjualanMakananController::class,'cetaklaporantransaksipenjualanmakanan'])->name('cetaklaporantransaksipenjualanmakanan')->middleware('auth');


//Tabel Laporan Pemesanan Online
Route::get('/laporan/data-pemesanan-online',[LaporanDataPemesananOnlineController::class,'indexlaporanpemesananonline'])->name('indexlaporanpemesananonline')->middleware('auth');
Route::get('/laporan/data-pemesanan-online/cetak/{tglawal}/{tglakhir}',[LaporanDataPemesananOnlineController::class,'cetaklaporantransaksipemesananonline'])->name('cetaklaporantransaksipemesananonline')->middleware('auth');

//Tabel Laporan Umum
Route::get('/laporan/data-umum',[LaporanDataUmumController::class,'indexlaporanumum'])->name('indexlaporanumum')->middleware('auth');
Route::get('/laporan/data-umum/cetak/{tglawal}/{tglakhir}',[LaporanDataUmumController::class,'cetaklaporantransaksiumum'])->name('cetaklaporantransaksiumum')->middleware('auth');



