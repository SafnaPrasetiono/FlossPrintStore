<?php

namespace App\Http\Controllers;

use App\pembayaran;
use App\pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class pembayaranController extends Controller
{
 // tampilkan pembayaran user dengan id_pembelian yang dituju
 public function index($id)
 {
  if (!Auth::guard('user')->check()) {
   abort(404);
  }
  $iduser = auth('user')->user()->id;
  if (isset($id)) {
   $pembelian = pembelian::where('id_pembelian', $id)->first();
   if ($pembelian->id_user != $iduser) {
    abort(404);
   } else {
    if ($pembelian->status === 'anjuran-bayar-lunas') {
     $pembayaran = pembayaran::where('id_pembelian', $id)->first();
     return view('pembayaran', [
      'pembelian' => $pembelian,
      'pembayaran' => $pembayaran
     ]);
    } else {
     return view('pembayaran', ['pembelian' => $pembelian]);
    }
   }
  } else {
   return redirect()->back();
  }
 }

 public function bayarproduk(Request $request)
 {
  if (!Auth::guard('user')->check()) {
   abort(404);
  }
  $chek = Validator::make($request->all(), [
   'id_pembelian' => 'required',
   'penyetor' => 'required',
   'bank' => 'required',
   'harga' => 'required',
   'bukti' => 'required',
   'bukti.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
  ]);
  if ($chek->fails()) {
   return redirect()->back()->withErrors($chek)->withInput();
  } else {
   $id_pembelian = $request->id_pembelian;

   $tanggal = date('Y-m-d');
   $jam = date('h:i:s');

   $resorce = $request->bukti;
   $fotobukti = $resorce->getClientOriginalName();
   $bukti = date('YmdHis') . $fotobukti;
   $data = pembayaran::create([
    'penyetor' => $request->penyetor,
    'bank' => $request->bank,
    'harga' => $request->harga,
    'tanggal' => $tanggal,
    'jam' => $jam,
    'bukti' => $bukti,
    'id_pembelian' => $id_pembelian
   ]);
   if ($data) {
    $resorce->move(public_path() . "/images/pembayaran", $bukti);
    pembelian::where('id_pembelian', $id_pembelian)->update([
     'status' => 'sudah-bayar'
    ]);
    return redirect()->route('user.riwayat.belanja')->with('success', 'Proses pembayaran berhasil');
   } else {
    return redirect()->back()->with('error', 'Maff proses tidak dapat dilakukan saat ini, ulangi nanti!');
   }
  }
 }

 public function bayarsablon(Request $request)
 {
  if (!Auth::guard('user')->check()) {
   abort(404);
  }
  $chek = Validator::make($request->all(), [
   'id_pembelian' => 'required',
   'penyetor' => 'required',
   'bank' => 'required',
   'harga' => 'required',
   'bukti' => 'required',
   'bukti.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
  ]);
  if ($chek->fails()) {
   return redirect()->back()->withErrors($chek)->withInput();
  } else {
   $id_pembelian = $request->id_pembelian;
   $tanggal = date('Y-m-d');
   $jam = date('h:i:s');
   // bukti pembayaran
   $resorce = $request->bukti;
   $fotobukti = $resorce->getClientOriginalName();
   $bukti = date('YmdHis') . $fotobukti;

   if ($request->bayar === "uangmuka") {
    $data = pembayaran::create([
     'penyetor' => $request->penyetor,
     'bank' => $request->bank,
     'harga' => $request->harga,
     'tanggal' => $tanggal,
     'jam' => $jam,
     'bukti' => $bukti,
     'id_pembelian' => $id_pembelian
    ]);
    if ($data) {
     $resorce->move(public_path() . "/images/pembayaran", $bukti);
     pembelian::where('id_pembelian', $id_pembelian)->update([
      'status' => 'sudah-bayar-uang-muka'
     ]);
     return redirect()->route('user.riwayat.belanja')->with('success', 'Proses pembayaran berhasil');
    } else {
     return redirect()->back()->with('error', 'Maff proses tidak dapat dilakukan saat ini, ulangi nanti!');
    }
   } elseif ($request->bayar === "tagihan") {
    $data = pembayaran::create([
     'penyetor' => $request->penyetor,
     'bank' => $request->bank,
     'harga' => $request->harga,
     'tanggal' => $tanggal,
     'jam' => $jam,
     'bukti' => $bukti,
     'id_pembelian' => $id_pembelian
    ]);
    if ($data) {
     $resorce->move(public_path() . "/images/pembayaran", $bukti);
     pembelian::where('id_pembelian', $id_pembelian)->update([
      'status' => 'sudah-bayar-tagihan'
     ]);
     return redirect()->route('user.riwayat.belanja')->with('success', 'Proses pembayaran berhasil');
    } else {
     return redirect()->back()->with('error', 'Maff proses tidak dapat dilakukan saat ini, ulangi nanti!');
    }
   } elseif ($request->bayar === "lunas") {
    $data = pembayaran::create([
     'penyetor' => $request->penyetor,
     'bank' => $request->bank,
     'harga' => $request->harga,
     'tanggal' => $tanggal,
     'jam' => $jam,
     'bukti' => $bukti,
     'id_pembelian' => $id_pembelian
    ]);
    if ($data) {
     $resorce->move(public_path() . "/images/pembayaran", $bukti);
     pembelian::where('id_pembelian', $id_pembelian)->update([
      'status' => 'bayar-lunas'
     ]);
     return redirect()->route('user.riwayat.belanja')->with('success', 'Proses pembayaran berhasil');
    } else {
     return redirect()->back()->with('error', 'Maff proses tidak dapat dilakukan saat ini, ulangi nanti!');
    }
   }
  }
 }

 public function detailpembayaran($id)
 {
  if (!Auth::guard('user')->check()) {
   abort(404);
  } else {
   $iduser = auth('user')->user()->id;
  }
  if (isset($id)) {
   $pembelian = pembelian::where('id_pembelian', $id)->first();

   if ($pembelian->id_user != $iduser) {
    abort(404);
   } else {
    // untuk memedakan tampilan detail pembayaran antar belanja dan pemesanan sablon
    if ($pembelian->tipe === 'pemesanan-produk') {
     $pembayaran = pembayaran::where('id_pembelian', $id)->first();
    } else {
     $pembayaran = pembayaran::where('id_pembelian', $id)->get();
    }

    return view('pembayarandetail', [
     'pembayaran' => $pembayaran,
     'pembelian' => $pembelian
    ]);
   }
  } else {
   return redirect()->back();
  }
 }
}
