<?php

/*
|--------------------------------------------------------------------------
| Web Routes FlossPrint Studios
|--------------------------------------------------------------------------
|
| Create        : Safna Prasetiono
| Making        : 12 juni 2020
| Finish        : 29 Agustus 2020
|
*/

// use spport form laravel system
use Illuminate\Support\Facades\Route;


// login form user
Route::get('/login', 'loginController@login')->name('user.login');
Route::post('/loginpost', 'loginController@loginpost')->name('user.login.post');
// register form user
Route::get('/register', 'registerController@register')->name('user.register');
Route::post('/registerpost', 'registerController@registerpost')->name('user.register.post');
Route::get('/register/aktivasi/akun/vkey={id}', 'registerController@aktivasi')->name('user.aktivasi');

// aktivasi account user
Route::get('/verifikasi', 'registerController@verifikasi')->name('verifikasi');
Route::post('/verifikasi/checked', 'registerController@verifikasipost')->name('verifikasipost');

// lupa password user dan ubah password
Route::get('/lupa-password', 'lupapasswordController@index')->name('user.lupapassword');
Route::post('/lupapassword/cekemail', 'lupapasswordController@cekemail')->name('user.email');
Route::get('/ubahpassword/akun/user/key={id}', 'lupapasswordController@cekkey')->name('user.activasi');
Route::post('/ubahpassword', 'lupapasswordController@ubahpassword')->name('user.password.update');

Route::get('/', 'homeController@index')->name('index');
Route::get('/home', 'homeController@index')->name('home');
Route::get('/tentangkami/', 'homeController@tentangkami')->name('home.tentangkami');
Route::get('/carabelanja/', 'homeController@carabelanja')->name('home.carabelanja');
Route::get('/syaratketentuan', 'homeController@syaratketentuan')->name('home.syaratketentuan');
Route::get('/sablon', 'homeController@bahanpakaian')->name('bahan');
Route::get('/produk', 'produkController@produk')->name('produk');
Route::get('/produk/desain', 'produkController@desainproduk')->name('desainproduk');
Route::get('/produk/kategori/{ctg}', 'produkController@ctgproduk')->name('ctgproduk');
Route::get('/produk/pencarian/', 'produkController@search')->name('produk.search');
Route::get('/produk/detail/{id}', 'produkController@detailproduk')->name('detailproduk');
Route::get('/produk/detail/{id}/ulasan', 'produkController@ulasanproduk')->name('ulasanproduk');

// Produk Order to Pemesanan
Route::post('/produk/order', 'pemesananController@order')->name('order');
Route::post('/produk/updateorder', 'pemesananController@updateorder')->name('updateorder');
Route::get('/produk/deleteorder/{id}', 'pemesananController@deleteorder')->name('deleteorder');

// Pemesanan Belanja Produk
Route::get('/pemesanan/keranjang-belanja', 'pemesananController@keranjang')->name('keranjang');

// Pemesanan Jasa Sablon
Route::get('/pemesanan/sablon', 'sablonController@sablon')->name('sablon.pemesanan');
Route::post('/pemesanan/sablon/render', 'sablonController@render')->name('sablon.render');
Route::get('/pemesanan/sablon/hapus', 'sablonController@hapussablon')->name('hapussablon');
Route::post('/pemesanan/sablon/proses', 'sablonController@pemesanansablon')->name('pemesanansablon');
Route::get('/pemesanan/sablon/proses/batal', 'sablonController@sablonbatal')->name('sablonbatal');

// Proses Checkout
Route::get('/pemesanan/checkout', 'pemesananController@checkout')->name('checkout');
Route::get('/pemesanan/{destination}/{weight}/{courier}', 'pemesananController@get_ongkir')->name('get_ongkir');
Route::get('/kota/{id}', 'pemesananController@get_kota')->name('get_kota');
Route::post('/pemesanan/checkout/proses', 'pemesananController@prosescheckout')->name('prosescheckout');


Route::prefix('user')->group(function () {
    // Nota dan Pembayaran User
    Route::get('/pembelian/nota/{id}', 'notaController@nota')->name('nota');

    // pembayaran user
    Route::get('/pembayaran/nota/{id}', 'pembayaranController@index')->name('user.pembayaran');
    Route::post('/pembayaran/produk', 'pembayaranController@bayarproduk')->name('user.pembayaran.produk');
    Route::post('/pembayaran/sablon', 'pembayaranController@bayarsablon')->name('user.pembayaran.sablon');
    Route::get('/pembayaran/detail/{id}', 'pembayaranController@detailpembayaran')->name('user.pembayaran.detail');

    // profile users
    Route::get('/profile', 'userController@profile')->name('profile');
    Route::post('/profile/updatefoto', 'userController@updatefoto')->name('updatefoto');
    Route::post('/profile/updatedata', 'userController@updatedata')->name('updatedata');

    // Riwayat Belanja
    Route::get('/riwayat-belanja', 'userController@riwayatbelanja')->name('user.riwayat.belanja');

    // notifikasi User
    Route::get('/notifikasi', 'userController@notifikasi')->name('user.notifikasi');

    // Ulasan produk User, Controller tetap di nota
    Route::post('/tanggapan/produk/', 'notaController@ulasan')->name('user.ulasan.produk');

    // logouts
    Route::get('/logout', 'homeController@logout')->name('user.logout');
});

Route::prefix('admin')->group(function () {
    // Get access admin system
    Route::get('/', 'admin\loginController@login')->name('loginfirst');
    Route::get('login', 'admin\loginController@login')->name('loginadmin');
    Route::post('loginpost', 'admin\loginController@loginpost')->name('loginpostadmin');
    Route::get('register', 'admin\registerController@register')->name('registeradmin');
    Route::post('registerpost', 'admin\registerController@registerpost')->name('registerpostadmin');

    // Access admin system
    Route::get('dashboard', 'admin\dashboardController@index')->name('dashboard');
    Route::get('logout', 'admin\dashboardController@logout')->name('logoutadmin');

    // Profile
    Route::get('/profile/', 'admin\profileController@index')->name('admin.profile');
    Route::post('/profile/update/foto/', 'admin\profileController@updatefoto')->name('admin.profile.update.foto');
    Route::post('/profile/update/data/', 'admin\profileController@updatedata')->name('admin.profile.update.data');

    // Bank CRUD
    Route::get('/bank/', 'admin\bankController@index')->name('bank');
    Route::get('/bank/tambah', 'admin\bankController@tambahbank')->name('tambahbank');
    Route::get('/bank/ubah/{id}', 'admin\bankController@ubahbank')->name('ubahbank');
    Route::post('/bank/tambah/insert', 'admin\bankController@insertbank')->name('insertbank');
    Route::post('/bank/ubah/update', 'admin\bankController@updatebank')->name('updatebank');

    // Product CRUD
    Route::get('produk/data', 'admin\produkController@dataproduk')->name('dataproduk');
    Route::get('produk/tambah', 'admin\produkController@tambahproduk')->name('tambahproduk');
    Route::post('produk/tambah/insert', 'admin\produkController@insertproduk')->name('insertproduk');
    Route::get('produk/ubah/{id}', 'admin\produkController@ubahproduk')->name('ubahproduk');
    Route::get('produk/hapus/{id}', 'admin\produkController@hapusproduk')->name('hapusproduk');
    Route::post('produk/ubah/update', 'admin\produkController@updateproduk')->name('updateproduk');
    Route::post('produk/ubah/fotoproduk/tambah', 'admin\produkController@tambahfotoproduk')->name('tambahfotoproduk');
    Route::get('produk/ubah/fotoproduk/hapus/{id}', 'admin\produkController@hapusfotoproduk')->name('hapusfotoproduk');

    // pemesanan
    Route::get('/pemesanan', 'admin\pemesananController@index')->name('pemesanan.pelanggan');
    Route::get('/pemesanan/data', 'admin\pemesananController@datapemesanan')->name('pemesanan.pelanggan.data');
    Route::get('/pemesanan/pelanggan/detail/{id}', 'admin\pemesananController@detailpemesanan')->name('pemesanan.pelanggan.detail');
    Route::get('/pemesanan/pelanggan/pembayaran/{id}', 'admin\pemesananController@pembayaran')->name('pembayaran.pemesanan.pelanggan');

    // pemesanan produk
    Route::get('/pemesanan/pelanggan/produk/pembayaran/{id}', 'admin\pemesananProduk@proses')->name('pemesanan.produk.proses');
    Route::post('/pemesanan/pelanggan/produk/pengiriman', 'admin\pemesananProduk@pengiriman')->name('pemesanan.produk.kirim');
    Route::post('/pemesanan/pelanggan/produk/selesai', 'admin\pemesananProduk@selesai')->name('pemesanan.produk.selesai');

    // pemesanan sablon
    Route::post('/pemesanan/pelanggan/sablon/uangmuka', 'admin\pemesananSablon@uangmuka')->name('pemesanan.sablon.uangmuka');
    Route::post('/pemesanan/pelanggan/sablon/tagihan', 'admin\pemesananSablon@tagihan')->name('pemesanan.sablon.tagihan');
    Route::post('/pemesanan/pelanggan/sablon/prosestagihan', 'admin\pemesananSablon@prosestagihan')->name('pemesanan.sablon.tagihan');
    Route::post('/pemesanan/pelanggan/sablon/lunas', 'admin\pemesananSablon@lunas')->name('pemesanan.sablon.tagihan');
    Route::post('/pemesanan/pelanggan/sablon/pengiriman', 'admin\pemesananSablon@pengiriman')->name('pemesanan.sablon.tagihan');
    Route::post('/pemesanan/pelanggan/sablon/selesai', 'admin\pemesananSablon@selesai')->name('pemesanan.sablon.selesai');

    // customer
    Route::get('pelanggan', 'admin\customerController@customer');

    // messages from user to admin as object to product
    Route::get('/message/', 'admin\messageController@index')->name('admin.message');
    Route::get('/message/{id}', 'admin\messageController@read')->name('admin.message.open');
    Route::post('/message/send/', 'admin\messageController@send')->name('admin.message.send');

    // Laporan Data Pemesanan
    Route::get('/laporan/', 'admin\laporanController@index')->name('admin.laporan');
    Route::get('/laporan/data', 'admin\laporanController@data')->name('admin.laporan.data');
    Route::get('/laporan/cetak/pdf/data', 'admin\laporanController@cetak')->name('admin.laporan.cetak');
});
