<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\pembayaran;
use App\pembelian;
use App\pengiriman;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class pemesananProduk extends Controller
{
 public function proses($id)
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }
  if (isset($id)) {
   $data = pembelian::where('id_pembelian', $id)->first();
   if ($data) {
    $pembayaran = pembayaran::where('id_pembelian', $id)->first();
    $user = User::where('id', $data->id_user)->first();
    $email = $user['email'];
    try {
     Mail::send(
      'admin.mail.mailpemesanan',
      [
       'pemesanan' => $data,
       'pembayaran' => $pembayaran
      ],
      function ($message) use ($email) {
       $message->subject('Pemesanan Produk');
       $message->from('flossprint71@gmail.com', 'Flossprint');
       $message->to($email);
      }
     );
     pembelian::where('id_pembelian', $id)->update(['status' => 'proses']);
     return redirect()->route('pemesanan.pelanggan')->with('success', 'pemesanan telah di proses');
    } catch (Exception $e) {
     return response(['status' => false, 'errors' => $e->getMessage()]);
    }
   } else {
    return redirect()->route('pemesanan.pelanggan')->with('error', 'Maff database error ulangi nanti!');
   }
  } else {
   return redirect()->back();
  }
 }

 public function pengiriman(Request $request)
 {
  $checked = Validator::make($request->all(), [
   'idpembelian' => 'required',
   'status' => 'required',
   'resi' => 'required'
  ]);
  if ($checked->fails()) {
   return redirect()->back()->withErrors($checked);
  } else {
   $update = pembelian::where('id_pembelian', $request->idpembelian)->update([
    'status' => $request->status
   ]);
   if ($update) {
    pengiriman::where('id_pembelian', $request->idpembelian)->update([
     'resi' => $request->resi
    ]);
    return redirect()->route('pemesanan.pelanggan')->with('success', 'Proses pengiriman berhasil');
   } else {
    return redirect()->route('pemesanan.pelanggan')->with('error', 'Proses gagal ulangi nanti!');
   }
  }
 }

 public function selesai(Request $request)
 {
  $checked = Validator::make($request->all(), [
   'idpembelian' => 'required',
   'status' => 'required',
  ]);
  if ($checked->fails()) {
   return redirect()->back()->withErrors($checked);
  } else {
   $update = pembelian::where('id_pembelian', $request->idpembelian)->update([
    'status' => $request->status
   ]);
   if ($update) {
    return redirect()->route('pemesanan.pelanggan')->with('success', 'Proses pemesanan berhasil terupdate');
   } else {
    return redirect()->route('pemesanan.pelanggan')->with('error', 'Proses gagal ulangi nanti!');
   }
  }
 }
}
