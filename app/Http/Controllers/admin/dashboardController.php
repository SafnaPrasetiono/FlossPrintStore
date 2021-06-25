<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\pembelian;
use App\produk;
use App\ulasanproduk;
use App\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
 // show admin dashboard form
 public function index()
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }
  // notifikasi pemesanan sudah bayar
  $pembelian = pembelian::whereIn('status', ['sudah-bayar', 'sudah-bayar-uang-muka', 'sudah-bayar-tagihan'])->get();
  if (empty(session('notif'))) {
   $notif = session()->get('notif');
   foreach ($pembelian as $pbl) {
    $users = User::where('id', $pbl->id_user)->first();
    $notif[$pbl->id_pembelian] = [
     'id_pembelian' => $pbl->id_pembelian,
     'tipe' => $pbl->tipe,
     'nama_lengkap' => $users['nama_lengkap'],
     'harga' => $pbl->harga,
     'tanggal' => $pbl->tanggal,
     'status' => $pbl->status,
    ];
   }
   session()->put('notif', $notif);
  }
  session()->forget('message');
  // notifikasi ulasan produk
  $ulasan = DB::table('view_ulasan_produk')->where('balasan', null)->get();
  if (empty(session('message'))) {
   $message = session()->get('message');
   foreach ($ulasan as $uls) {
    $message[$uls->id_ulasan] = [
     'id_ulasan' => $uls->id_ulasan,
     'rating' => $uls->rating,
     'tanggapan' => $uls->tanggapan,
     'balasan' => $uls->balasan,
     'tanggal' => $uls->tanggal,
     'id_produk' => $uls->id_produk,
     'id_user' => $uls->id_user,
     'nama_lengkap' => $uls->nama_lengkap,
     'foto' => $uls->foto
    ];
   }
   session()->put('message', $message);
  }
  $pelanggan = count(User::all());
  $jumproduk = count(produk::all());
  $jumprodukhabis = count(produk::where('stok', 0)->get());
  $terjual = count(produk::where('terjual', '> 0')->get());
  $pemesanan_produk = count(pembelian::where('tipe', 'pemesanan-produk')->get());
  $pemesanan_sablon = count(pembelian::where('tipe', 'pemesanan-sablon')->get());
  $sudah_bayar = count(pembelian::whereIn('status', ['sudah-bayar', 'sudah-bayar-uang-muka', 'sudah-bayar-tagihan'])->get());
  $selesai = count(pembelian::where('status', 'selesai')->get());
  return view('admin.dashboard', [
   'pelanggan' => $pelanggan,
   'jumproduk' => $jumproduk,
   'jumprodukhabis' => $jumprodukhabis,
   'terjual' => $terjual,
   'pemesananproduk' => $pemesanan_produk,
   'pemesanansablon' => $pemesanan_sablon,
   'sudahbayar' => $sudah_bayar,
   'selesai' => $selesai
  ]);
 }
 public function logout()
 {
  if (Auth::guard('admin')->check()) {
   session()->has('notif');
   session()->put('notif');
   Auth::guard('admin')->Logout();
   return redirect('/');
  }
 }
}
