<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\pembayaran;
use App\pembelian;
use App\pembelianproduk;
use App\pembelianproduksablon;
use App\pengiriman;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;

class pemesananController extends Controller
{
 use WithPagination;
 // show pemesanan index
 public function index()
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }
  $pemesanan = DB::table('view_pembelian_users')->paginate(12);
  return view('admin.pemesanan', [
   'tipe' => 'Data Pemesanan',
   'pemesanan' => $pemesanan
  ]);
 }
 // pencarian pemesanan
 public function datapemesanan(Request $request)
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }
  if (empty($request->srcpemesanan)) {
   if ($request->tipe === "pemesanan") {
    $pemesanan = DB::table('view_pembelian_users')->paginate(12);
   } else {
    $pemesanan = DB::table('view_pembelian_users')->where('tipe', $request->tipe)->paginate(12);
   }
  } else {
   if ($request->tipe === "pemesanan-produk") {
    $pemesanan = DB::table('view_pembelian_users')->where([
     ['tipe', '=', $request->tipe],
     ['nama_lengkap', 'like', '%' . $request->srcpemesanan . '%']
    ])->paginate(12);
   } elseif ($request->tipe === "pemesanan-sablon") {
    $pemesanan = DB::table('view_pembelian_users')->where([
     ['tipe', '=', $request->tipe],
     ['nama_lengkap', 'like', '%' . $request->srcpemesanan . '%']
    ])->paginate(12);
   } else {
    $pemesanan = DB::table('view_pembelian_users')->where('nama_lengkap', 'like', '%' . $request->srcpemesanan . '%')->paginate(12);
   }
  }
  return view('admin.pemesanan', [
   'tipe' => $request->tipe,
   'pemesanan' => $pemesanan
  ]);
 }

 // detail nota pemesanan
 public function detailpemesanan($id)
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }
  if (isset($id)) {
   // jika dilihat maka dalam notif sudah di baca atau sudah dilihat
   $notif = session()->get('notif');
   unset($notif[$id]);
   session()->put('notif', $notif);
   $pembelian = pembelian::where('id_pembelian', $id)->first();
   $id_user = $pembelian->id_user;
   $pelanggan = User::where('id', $id_user)->first();
   $pengiriman = pengiriman::where('id_pembelian', $id)->first();
   if ($pembelian->tipe === "pemesanan-produk") {
    $pembelian_produk = pembelianproduk::where('id_pembelian', $id)->get();
   } else {
    $pembelian_produk = pembelianproduksablon::where('id_pembelian', $id)->get();
   }
   return view('admin.detailpemesanan', [
    'pembelian' => $pembelian,
    'pelanggan' => $pelanggan,
    'pengiriman' => $pengiriman,
    'pembelian_p' => $pembelian_produk,
   ]);
  } else {
   return redirect()->back();
  }
 }

 // pembayaran
 public function pembayaran($id)
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }
  if (isset($id)) {
   $pembelian = pembelian::where('id_pembelian', $id)->first();
   // pembayaran tergantung pada tipe pemesanan
   if ($pembelian->tipe === 'pemesanan-produk') {
    $pembayaran = pembayaran::where('id_pembelian', $id)->first();
   } else {
    // pembayaran pemesanan sablon terdapat uang muka dan uang sisa
    $pembayaran = pembayaran::where('id_pembelian', $id)->get();
   }
   return view('admin.prosespembayaran', [
    'pembayaran' => $pembayaran,
    'pembelian' => $pembelian
   ]);
  } else {
   return redirect()->back();
  }
 }
}
