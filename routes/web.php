<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanStokController;
use App\Http\Controllers\TransaksiAlatController;
use App\Http\Controllers\TransaksiUmumController;
use App\Http\Controllers\MasterDataAlatController;
use App\Http\Controllers\TransaksiBahanController;
use App\Http\Controllers\LaporanDataAlatController;
use App\Http\Controllers\LaporanDataUmumController;
use App\Http\Controllers\MasterDataBahanController;
use App\Http\Controllers\LaporanDataBahanController;
use App\Http\Controllers\MasterDataMakananController;
use App\Http\Controllers\MasterDataKategoriController;
use App\Http\Controllers\MasterDataPemesananController;
use App\Http\Controllers\LaporanOmzetPertahunController;
use App\Http\Controllers\LaporanMakananTerlarisController;
use App\Http\Controllers\TransaksiPemesananOnlineController;
use App\Http\Controllers\TransaksiPenjualanMakananController;
use App\Http\Controllers\LaporanDataPemesananOnlineController;
use App\Http\Controllers\LaporanDataPenjualanMakananController;

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

// Route::get('transaksi_alat',['transaksi_alat'=>'LaporanDataAlatController@search','as'=>'Laporan.LaporanDataAlat.index']);
Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin',[DashboardController::class,'admin']);
    Route::get('/admin/contact',[ContactController::class,'admin']);

    //Tabel Users
    Route::get('/admin/users',[UsersController::class,'index'])->name('index');
    Route::get('/admin/users/tambah',[UsersController::class,'tambahusers'])->name('tambahusers');
    Route::post('/admin/users/simpan',[UsersController::class,'simpanusers'])->name('simpanusers');
    Route::get('/admin/users/ubah/{id}',[UsersController::class,'ubahusers'])->name('ubahusers');
    Route::post('/admin/users/update',[UsersController::class,'updateusers'])->name('updateusers');
    Route::get('/admin/users/hapus/{id}',[UsersController::class,'hapususers'])->name('hapususers');

     //Tabel Kategori
     Route::get('/master-data/data-kategori',[MasterDataKategoriController::class,'indexkategori'])->name('indexkategori');
     Route::get('/master-data/data-kategori/tambah',[MasterDataKategoriController::class,'tambahkategori'])->name('tambahkategori');
     Route::post('/master-data/data-kategori/simpan',[MasterDataKategoriController::class,'simpankategori'])->name('simpankategori');
     Route::get('/master-data/data-kategori/ubah/{id_kategori}',[MasterDataKategoriController::class,'ubahkategori'])->name('ubahkategori');
     Route::post('/master-data/data-kategori/update',[MasterDataKategoriController::class,'updatekategori'])->name('updatekategori');
     Route::get('/master-data/data-kategori/hapus/{id_kategori}',[MasterDataKategoriController::class,'hapuskategori'])->name('hapuskategori');
     // Route::get('/master-data/data-kategori/lihat/{id_kategori}',[MasterDataKategoriController::class,'lihatkategori'])->name('lihatkategori');
 
     //Tabel Makanan
     Route::get('/master-data/data-makanan',[MasterDataMakananController::class,'indexmakanan'])->name('indexmakanan');
     Route::get('/master-data/data-makanan/tambah',[MasterDataMakananController::class,'tambahmakanan'])->name('tambahmakanan');
     Route::post('/master-data/data-makanan/simpan',[MasterDataMakananController::class,'simpanmakanan'])->name('simpanmakanan');
     Route::get('/master-data/data-makanan/ubah/{id_makanan}',[MasterDataMakananController::class,'ubahmakanan'])->name('ubahmakanan');
     Route::post('/master-data/data-makanan/update',[MasterDataMakananController::class,'updatemakanan'])->name('updatemakanan');
     Route::get('/master-data/data-makanan/hapus/{id_makanan}',[MasterDataMakananController::class,'hapusmakanan'])->name('hapusmakanan');
     // Route::get('/master-data/data-makanan/lihat/{id_makanan}',[MasterDataMakananController::class,'lihatmakanan'])->name('lihatmakanan');
 
     //Tabel Bahan
     Route::get('/master-data/data-bahan',[MasterDataBahanController::class,'indexbahan'])->name('indexbahan');
     Route::get('/master-data/data-bahan/tambah',[MasterDataBahanController::class,'tambahbahan'])->name('tambahbahan');
     Route::post('/master-data/data-bahan/simpan',[MasterDataBahanController::class,'simpanbahan'])->name('simpanbahan');
     Route::get('/master-data/data-bahan/ubah/{id_bahan}',[MasterDataBahanController::class,'ubahbahan'])->name('ubahbahan');
     Route::post('/master-data/data-bahan/update',[MasterDataBahanController::class,'updatebahan'])->name('updatebahan');
     Route::get('/master-data/data-bahan/hapus/{id_bahan}',[MasterDataBahanController::class,'hapusbahan'])->name('hapusbahan');
     // Route::get('/master-data/data-bahan/lihat/{id_bahan}',[MasterDataBahanController::class,'lihatbahan'])->name('lihatbahan');
 
     //Tabel Alat
     Route::get('/master-data/data-alat',[MasterDataAlatController::class,'indexalat'])->name('indexalat');
     Route::get('/master-data/data-alat/tambah',[MasterDataAlatController::class,'tambahalat'])->name('tambahalat');
     Route::post('/master-data/data-alat/simpan',[MasterDataAlatController::class,'simpanalat'])->name('simpanalat');
     Route::get('/master-data/data-alat/ubah/{id_alat}',[MasterDataAlatController::class,'ubahalat'])->name('ubahalat');
     Route::post('/master-data/data-alat/update',[MasterDataAlatController::class,'updatealat'])->name('updatealat');
     Route::get('/master-data/data-alat/hapus/{id_alat}',[MasterDataAlatController::class,'hapusalat'])->name('hapusalat');
     // Route::get('/master-data/data-alat/lihat/{id_alat}',[MasterDataAlatController::class,'lihatalat'])->name('lihatalat');
 
     //Tabel Pemesanan
     Route::get('/master-data/data-pemesanan',[MasterDataPemesananController::class,'indexpemesanan'])->name('indexpemesanan');
     Route::get('/master-data/data-pemesanan/tambah',[MasterDataPemesananController::class,'tambahpemesanan'])->name('tambahpemesanan');
     Route::post('/master-data/data-pemesanan/simpan',[MasterDataPemesananController::class,'simpanpemesanan'])->name('simpanpemesanan');
     Route::get('/master-data/data-pemesanan/ubah/{id_pemesanan}',[MasterDataPemesananController::class,'ubahpemesanan'])->name('ubahpemesanan');
     Route::post('/master-data/data-pemesanan/update',[MasterDataPemesananController::class,'updatepemesanan'])->name('updatepemesanan');
     Route::get('/master-data/data-pemesanan/hapus/{id_pemesanan}',[MasterDataPemesananController::class,'hapuspemesanan'])->name('hapuspemesanan');
     // Route::get('/master-data/data-pemesanan/lihat/{id_pemesanan}',[MasterDataPemesananController::class,'lihatpemesanan'])->name('lihatpemesanan');


     // Tabel Laporan Alat
    Route::get('/admin/laporan/data-alat',[LaporanDataAlatController::class,'indexlaporanalat'])->name('indexlaporanalat');
    Route::get('/admin/laporan/data-alat/cetak/{tglawal}/{tglakhir}',[LaporanDataAlatController::class,'cetaktgl'])->name('cetaktgl');
    Route::get('/admin/laporan/data-alat/cetak/{nama_alat:id}',[LaporanDataAlatController::class,'cetaknamaalat'])->name('cetaknamaalat');

    // Tabel Laporan Bahan
    Route::get('/admin/laporan/data-bahan',[LaporanDataBahanController::class,'indexlaporanbahan'])->name('indexlaporanbahan');
    Route::get('/admin/laporan/data-bahan/cetak/{tglawal}/{tglakhir}',[LaporanDataBahanController::class,'cetaklaporantransaksibahan'])->name('cetaklaporantransaksibahan');

    // Tabel Laporan Penjualan Makanan
    Route::get('/admin/laporan/data-penjualan-makanan',[LaporanDataPenjualanMakananController::class,'indexlaporanpenjualanmakanan'])->name('indexlaporanpenjualanmakanan');
    Route::get('/admin/laporan/data-penjualan-makanan/cetak/{tglawal}/{tglakhir}',[LaporanDataPenjualanMakananController::class,'cetaklaporantransaksipenjualanmakanan'])->name('cetaklaporantransaksipenjualanmakanan');

    //Tabel Laporan Pemesanan Online
    Route::get('/admin/laporan/data-pemesanan-online',[LaporanDataPemesananOnlineController::class,'indexlaporanpemesananonline'])->name('indexlaporanpemesananonline');
    Route::get('/admin/laporan/data-pemesanan-online/cetak/{tglawal}/{tglakhir}',[LaporanDataPemesananOnlineController::class,'cetaklaporantransaksipemesananonline'])->name('cetaklaporantransaksipemesananonline');

    //Tabel Laporan Umum
    Route::get('/admin/laporan/data-umum',[LaporanDataUmumController::class,'indexlaporanumum'])->name('indexlaporanumum');
    Route::get('/admin/laporan/data-umum/cetak/{tglawal}/{tglakhir}',[LaporanDataUmumController::class,'cetaklaporantransaksiumum'])->name('cetaklaporantransaksiumum');

    // Menu Stok
    Route::get('/admin/stok/stok-alat',[LaporanStokController::class,'indexstokalat'])->name('indexstokalat');
    Route::get('/admin/stok/stok-alat/cetak',[LaporanStokController::class,'cetaklaporanstok'])->name('cetaklaporanstok');

    // Makanan Terlaris
    Route::get('/admin/laporan/makanan-terlaris',[LaporanMakananTerlarisController::class,'indexmakananterlaris'])->name('indexmakananterlaris');
    Route::get('/admin/laporan/makanan-terlaris/cetak/{tglawal}/{tglakhir}',[LaporanMakananTerlarisController::class,'cetakmakananterlaris'])->name('cetakmakananterlaris');

    // Omzet Pertahun
    Route::get('/admin/laporan/omzet-pertahun',[LaporanOmzetPertahunController::class,'indexomzetpertahun'])->name('indexomzetpertahun');
    Route::get('/admin/laporan/omzet-pertahun/cetak/{tahun}',[LaporanOmzetPertahunController::class,'cetakomzerpertahun'])->name('cetakomzerpertahun');
});



Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard',[DashboardController::class,'index']);
    // Route::get('/user/profile/{id}',[DashboardController::class,'profile']);
    // Route::get('/user/profile/ubah/{id}',[DashboardController::class,'ubahprofile']);
    // Route::get('/user/profile/update',[DashboardController::class,'updateprofile']);
    Route::get('/contact',[ContactController::class,'index']);
    

    //Tabel Transaksi Alat
    Route::get('/transaksi/data-alat',[TransaksiAlatController::class,'indextransaksialat'])->name('indextransaksialat');
    Route::get('/transaksi/data-alat/tambah',[TransaksiAlatController::class,'tambahtransaksialat'])->name('tambahtransaksialat');
    Route::post('/transaksi/data-alat/simpan',[TransaksiAlatController::class,'simpantransaksialat'])->name('simpantransaksialat');
    Route::get('/transaksi/data-alat/ubah/{id_transaksialat}',[TransaksiAlatController::class,'ubahtransaksialat'])->name('ubahtransaksialat');
    Route::post('/transaksi/data-alat/update',[TransaksiAlatController::class,'updatetransaksialat'])->name('updatetransaksialat');
    Route::get('/transaksi/data-alat/hapus/{id_transaksialat}',[TransaksiAlatController::class,'hapustransaksialat'])->name('hapustransaksialat');
    // Route::get('/transaksi/data-alat/lihat/{id_transaksialat}',[TransaksiAlatController::class,'lihattransaksialat'])->name('lihattransaksialat');

    //Tabel Transaksi Bahan
    Route::get('/transaksi/data-bahan',[TransaksiBahanController::class,'indextransaksibahan'])->name('indextransaksibahan');
    Route::get('/transaksi/data-bahan/tambah',[TransaksiBahanController::class,'tambahtransaksibahan'])->name('tambahtransaksibahan');
    Route::post('/transaksi/data-bahan/simpan',[TransaksiBahanController::class,'simpantransaksibahan'])->name('simpantransaksibahan');
    Route::get('/transaksi/data-bahan/ubah/{id_transaksibahan}',[TransaksiBahanController::class,'ubahtransaksibahan'])->name('ubahtransaksibahan');
    Route::post('/transaksi/data-bahan/update',[TransaksiBahanController::class,'updatetransaksibahan'])->name('updatetransaksibahan');
    Route::get('/transaksi/data-bahan/hapus/{id_transaksibahan}',[TransaksiBahanController::class,'hapustransaksibahan'])->name('hapustransaksibahan');
    // Route::get('/transaksi/data-bahan/lihat/{id_transaksibahan}',[TransaksiBahanController::class,'lihattransaksibahan'])->name('lihattransaksibahan');

    //Tabel Transaksi Penjualan Makanan
    Route::get('/transaksi/data-penjualan-makanan',[TransaksiPenjualanMakananController::class,'indexpenjualanmakanan'])->name('indexpenjualanmakanan');
    Route::get('/transaksi/data-penjualan-makanan/tambah',[TransaksiPenjualanMakananController::class,'tambahpenjualanmakanan'])->name('tambahpenjualanmakanan');
    Route::post('/transaksi/data-penjualan-makanan/simpan',[TransaksiPenjualanMakananController::class,'simpanpenjualanmakanan'])->name('simpanpenjualanmakanan');
    Route::get('/transaksi/data-penjualan-makanan/ubah/{id_penjualan}',[TransaksiPenjualanMakananController::class,'ubahpenjualanmakanan'])->name('ubahpenjualanmakanan');
    Route::post('/transaksi/data-penjualan-makanan/update',[TransaksiPenjualanMakananController::class,'updatepenjualanmakanan'])->name('updatepenjualanmakanan');
    Route::get('/transaksi/data-penjualan-makanan/hapus/{id_penjualan}',[TransaksiPenjualanMakananController::class,'hapuspenjualanmakanan'])->name('hapuspenjualanmakanan');
    // Route::get('/transaksi/data-penjualan-makanan/lihat/{id_penjualan}',[TransaksiPenjualanMakananController::class,'lihatpenjualanmakanan'])->name('lihatpenjualanmakanan');

    //Tabel Transaksi Pemesanan Online
    Route::get('/transaksi/data-pemesanan-online',[TransaksiPemesananOnlineController::class,'indexpemesananonline'])->name('indexpemesananonline');;
    Route::get('/transaksi/data-pemesanan-online/tambah',[TransaksiPemesananOnlineController::class,'tambahpemesananonline'])->name('tambahpemesananonline');
    Route::post('/transaksi/data-pemesanan-online/simpan',[TransaksiPemesananOnlineController::class,'simpanpemesananonline'])->name('simpanpemesananonline');
    Route::get('/transaksi/data-pemesanan-online/ubah/{id_online}',[TransaksiPemesananOnlineController::class,'ubahpemesananonline'])->name('ubahpemesananonline');
    Route::post('/transaksi/data-pemesanan-online/update',[TransaksiPemesananOnlineController::class,'updatepemesananonline'])->name('updatepemesananonline');
    Route::get('/transaksi/data-pemesanan-online/hapus/{id_online}',[TransaksiPemesananOnlineController::class,'hapuspemesananonline'])->name('hapuspemesananonline');
    Route::get('/transaksi/data-pemesanan-online/lihat/{id_online}',[TransaksiPemesananOnlineController::class,'lihatpemesananonline'])->name('lihatpemesananonline');

    //Tabel Transaksi Umum
    Route::get('/transaksi/data-umum',[TransaksiUmumController::class,'indextransaksiumum'])->name('indextransaksiumum');;
    Route::get('/transaksi/data-umum/tambah',[TransaksiUmumController::class,'tambahtransaksiumum'])->name('tambahtransaksiumum');
    Route::post('/transaksi/data-umum/simpan',[TransaksiUmumController::class,'simpantransaksiumum'])->name('simpantransaksiumum');
    Route::get('/transaksi/data-umum/ubah/{id_umum}',[TransaksiUmumController::class,'ubahtransaksiumum'])->name('ubahtransaksiumum');
    Route::post('/transaksi/data-umum/update/{id_umum}',[TransaksiUmumController::class,'updatetransaksiumum'])->name('updatetransaksiumum');
    Route::get('/transaksi/data-umum/hapus/{id_umum}',[TransaksiUmumController::class,'hapustransaksiumum'])->name('hapustransaksiumum');
    // Route::get('/transaksi/data-umum/lihat/{id_umum}',[TransaksiUmumController::class,'lihattransaksiumum'])->name('lihattransaksiumum');

    // Tabel Laporan Alat
    Route::get('/laporan/data-alat',[LaporanDataAlatController::class,'indexlaporanalat'])->name('indexlaporanalat');
    Route::get('/laporan/data-alat/cetak/{tglawal}/{tglakhir}',[LaporanDataAlatController::class,'cetaktgl'])->name('cetaktgl');
    // Route::get('/laporan/data-alat/cetak/{nama_alat:id_transaksialat}',[LaporanDataAlatController::class,'cetaknamaalat'])->name('cetaknamaalat');

    // Tabel Laporan Bahan
    Route::get('/laporan/data-bahan',[LaporanDataBahanController::class,'indexlaporanbahan'])->name('indexlaporanbahan');
    Route::get('/laporan/data-bahan/cetak/{tglawal}/{tglakhir}',[LaporanDataBahanController::class,'cetaklaporantransaksibahan'])->name('cetaklaporantransaksibahan');

    // Tabel Laporan Penjualan Makanan
    Route::get('/laporan/data-penjualan-makanan',[LaporanDataPenjualanMakananController::class,'indexlaporanpenjualanmakanan'])->name('indexlaporanpenjualanmakanan');
    Route::get('/laporan/data-penjualan-makanan/cetak/{tglawal}/{tglakhir}',[LaporanDataPenjualanMakananController::class,'cetaklaporantransaksipenjualanmakanan'])->name('cetaklaporantransaksipenjualanmakanan');

    //Tabel Laporan Pemesanan Online
    Route::get('/laporan/data-pemesanan-online',[LaporanDataPemesananOnlineController::class,'indexlaporanpemesananonline'])->name('indexlaporanpemesananonline');
    Route::get('/laporan/data-pemesanan-online/cetak/{tglawal}/{tglakhir}',[LaporanDataPemesananOnlineController::class,'cetaklaporantransaksipemesananonline'])->name('cetaklaporantransaksipemesananonline');

    //Tabel Laporan Umum
    Route::get('/laporan/data-umum',[LaporanDataUmumController::class,'indexlaporanumum'])->name('indexlaporanumum');
    Route::get('/laporan/data-umum/cetak/{tglawal}/{tglakhir}',[LaporanDataUmumController::class,'cetaklaporantransaksiumum'])->name('cetaklaporantransaksiumum');

    // Menu Stok
    Route::get('/stok/stok-alat',[LaporanStokController::class,'indexstokalat'])->name('indexstokalat');
    Route::get('/stok/stok-alat/cetak',[LaporanStokController::class,'cetaklaporanstok'])->name('cetaklaporanstok');

    // Makanan Terlaris
    Route::get('/laporan/makanan-terlaris',[LaporanMakananTerlarisController::class,'indexmakananterlaris'])->name('indexmakananterlaris');
    Route::get('/laporan/makanan-terlaris/cetak/{tglawal}/{tglakhir}',[LaporanMakananTerlarisController::class,'cetakmakananterlaris'])->name('cetakmakananterlaris');

    // Omzet Pertahun
    Route::get('/laporan/omzet-pertahun',[LaporanOmzetPertahunController::class,'indexomzetpertahun'])->name('indexomzetpertahun');
    Route::get('/laporan/omzet-pertahun/cetak/{tahun}',[LaporanOmzetPertahunController::class,'cetakomzerpertahun'])->name('cetakomzerpertahun');
    
});






