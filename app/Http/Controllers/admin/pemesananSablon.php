<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\pembayaran;
use App\pembelian;
use App\pengiriman;
use App\prosessablon;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class pemesananSablon extends Controller
{
 // konfirmasi pembayaran uang muka dan estimasi waktu sablon
 public function uangmuka(Request $request)
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }
  $check = Validator::make($request->all(), [
   'idpembelian' => 'required',
   'waktuperkiraan' => 'required',
   'status' => 'required'
  ]);
  if ($check->fails()) {
   return redirect()->back()->with('error', 'field input masih kosong!');
  } else {
   $idpembelian = $request->idpembelian;
   $data = pembelian::where('id_pembelian', $idpembelian)->first();
   $pembayaran = pembayaran::where('id_pembelian', $idpembelian)->get();
   $user = User::where('id', $data->id_user)->first();
   $email = $user['email'];
   // update status
   $update = pembelian::where('id_pembelian', $idpembelian)->update([
    'status' => $request->status
   ]);
   if ($update) {
    // waktu proses
    $datenow = date('Y-m-d');
    prosessablon::create([
     'mulai' => $datenow,
     'perkiraan' => $request->waktuperkiraan,
     'id_pembelian' => $idpembelian
    ]);
    Mail::send(
     'admin.mail.mailpemesanan',
     [
      'pemesanan' => $data,
      'pembayaran' => $pembayaran
     ],
     function ($message) use ($email) {
      $message->subject('Pemesanan Sablon');
      $message->from('flossprint71@gmail.com', 'Flossprint');
      $message->to($email);
     }
    );
    return redirect()->route('pemesanan.pelanggan')->with('success', 'Proses pembayaran telah dikonfirmasi');
   } else {
    return redirect()->back()->with('error', 'Maff database error!');
   }
  }
 }
 // konfirmasi anjuran bayar lunas dari sisa pembyaran uang muka
 public function tagihan(Request $request)
 {
  $check = Validator::make($request->all(), [
   'idpembelian' => 'required',
   'status' => 'required'
  ]);
  if ($check->fails()) {
   return redirect()->back()->with('error', 'field input masih kosong!');
  } else {
   $idpembelian = $request->idpembelian;
   $data = pembelian::where('id_pembelian', $idpembelian)->first();
   $pembayaran = pembayaran::where('id_pembelian', $idpembelian)->get();
   $user = User::where('id', $data->id_user)->first();
   $email = $user['email'];

   $update = pembelian::where('id_pembelian', $idpembelian)->update([
    'status' => $request->status
   ]);
   if ($update) {
    Mail::send(
     'admin.mail.mailpemesanan',
     [
      'info' => 'tagihan',
      'pemesanan' => $data,
      'pembayaran' => $pembayaran
     ],
     function ($message) use ($email) {
      $message->subject('Tagihan Pemesanan Sablon');
      $message->from('flossprint71@gmail.com', 'Flossprint');
      $message->to($email);
     }
    );
    return redirect()->route('pemesanan.pelanggan')->with('success', 'Proses pembayaran telah dikonfirmasi');
   } else {
    return redirect()->back()->with('error', 'Maff database error!');
   }
  }
 }
 // memproses pembayaran tagihan
 public function prosestagihan(Request $request)
 {
  $check = Validator::make($request->all(), [
   'idpembelian' => 'required',
   'waktuselesai' => 'required',
   'status' => 'required'
  ]);
  if ($check->fails()) {
   return redirect()->back()->with('error', 'field input masih kosong!');
  } else {
   $idpembelian = $request->idpembelian;
   $data = pembelian::where('id_pembelian', $idpembelian)->first();
   $pembayaran = pembayaran::where('id_pembelian', $idpembelian)->get();
   $user = User::where('id', $data->id_user)->first();
   $email = $user['email'];
   // update status
   $update = pembelian::where('id_pembelian', $idpembelian)->update([
    'status' => $request->status
   ]);
   if ($update) {
    // waktu proses
    prosessablon::where('id_pembelian', $idpembelian)->update([
     'selesai' => $request->waktuselesai
    ]);
    Mail::send(
     'admin.mail.mailpemesanan',
     [
      'pemesanan' => $data,
      'pembayaran' => $pembayaran
     ],
     function ($message) use ($email) {
      $message->subject('Pemesanan Sablon');
      $message->from('flossprint71@gmail.com', 'Flossprint');
      $message->to($email);
     }
    );
    return redirect()->route('pemesanan.pelanggan')->with('success', 'Proses pembayaran telah dikonfirmasi');
   } else {
    return redirect()->back()->with('error', 'Maff database error!');
   }
  }
 }
 // proses jika ada pelanggan bayar lunas pemesanan sablon
 public function lunas(Request $request)
 {
  $check = Validator::make($request->all(), [
   'idpembelian' => 'required',
   'waktuselesai' => 'required',
   'status' => 'required'
  ]);
  if ($check->fails()) {
   return redirect()->back()->with('error', 'field input masih kosong!');
  } else {
   $idpembelian = $request->idpembelian;
   $data = pembelian::where('id_pembelian', $idpembelian)->first();
   $pembayaran = pembayaran::where('id_pembelian', $idpembelian)->get();
   $user = User::where('id', $data->id_user)->first();
   $email = $user['email'];
   // update status
   $update = pembelian::where('id_pembelian', $idpembelian)->update([
    'status' => $request->status
   ]);
   if ($update) {
    // waktu proses
    $datenow = date('Y-m-d');
    prosessablon::create([
     'mulai' => $datenow,
     'perkiraan' => $request->waktuselesai,
     'perkiraan' => $request->waktuselesai,
     'id_pembelian' => $idpembelian
    ]);
    Mail::send(
     'admin.mail.mailpemesanan',
     [
      'pemesanan' => $data,
      'pembayaran' => $pembayaran
     ],
     function ($message) use ($email) {
      $message->subject('Pemesanan Sablon');
      $message->from('flossprint71@gmail.com', 'Flossprint');
      $message->to($email);
     }
    );
    return redirect()->route('pemesanan.pelanggan')->with('success', 'Proses pembayaran telah dikonfirmasi');
   } else {
    return redirect()->back()->with('error', 'Maff database error!');
   }
  }
 }
 // konfirmasi pengiriman
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
    // update resi
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
