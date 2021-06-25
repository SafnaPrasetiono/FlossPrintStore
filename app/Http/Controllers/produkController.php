<?php

namespace App\Http\Controllers;

use App\fotoproduk;
use App\produk;
use App\ulasanproduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;

class produkController extends Controller
{

 use WithPagination;
 // menampilkan page produk
 public function produk()
 {
  $produk = produk::paginate(12);
  return view('produk', [
   'produk' => $produk
  ]);
 }
 public function ctgproduk($ctg)
 {
  if ($ctg === 'semua') {
   $ctgproduk = produk::paginate(12);
  } else {
   $ctgproduk = produk::where('jenis', $ctg)->paginate(12);
  }
  return view('produk', [
   'produk' => $ctgproduk
  ]);
 }
 public function search(Request $request)
 {
  $pencarian = $request->search;
  $produk = produk::where('namaproduk', 'like', '%' . $pencarian . '%')->paginate(12);
  return view('produk', [
   'produk' => $produk
  ]);
 }
 public function detailproduk($id)
 {
  // cek terlebih dahulu apakan produk ada?
  $cekproduk = produk::where('id_produk', $id)->first();
  if (empty($cekproduk)) {
   // jika tidak maka dilarikan ke route home
   return redirect('home');
  } else {
   // jika ada maka akan ditampilkan data produk
   $detailproduk = produk::where('id_produk', $id)->get();
   // mulltiple foto produk
   $fotoproduk = fotoproduk::where('id_produk', $id)->get();
   // ulasan produk
   $ulasan = DB::table('view_ulasan_produk')->where('id_produk', $id)->get();
   // memberikan nilai ke view detail produk
   return view('detailproduk', [
    'detailproduk' => $detailproduk,
    'fotoproduk' => $fotoproduk,
    'ulasan' => $ulasan
   ]);
  }
 }
 // fungsi tampilkan desan sablon
 public function desainproduk()
 {
  // menampilkan halaman desain produk
  return view('desainproduk');
 }
 public function ulasanproduk($id, Request $request)
 {
  // membuat ulasan produk
  if (Auth::guard('user')->check()) {
   // ambil id produk terlebih dahulu
   $id_produk = $id;
   // ambil id user yang ingin chat produk
   $IdUser     = auth('user')->user()->id;
   // validasi content review produk
   $cekreview = Validator::make($request->all(), [
    'contentreview' => 'required',
   ]);
   if ($cekreview->fails()) {
    return redirect()->back()
     ->withInput();
   } else {
    $date = date("d/m/Y h:i:s");
    DB::table('ulasanproduk')->insert([
     'pesan' => $request->contentreview,
     'balasan' => '',
     'tanggal' => $date,
     'idproduk' => $id_produk,
     'id_user' => $IdUser,
    ]);
   }
  } else {
   return redirect()->route('loginuser');
  }
 }
}
