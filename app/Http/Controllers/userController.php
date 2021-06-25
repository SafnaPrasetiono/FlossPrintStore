<?php

namespace App\Http\Controllers;

use App\pembelian;
use app\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
 // show profile
 public function profile()
 {
  if (Auth::guard('user')->check()) {
   if (Auth::guard('user')->check()) {
    $id_user = Auth::guard('user')->user()->id;
    $pembelian = DB::table('view_pembelian_pengiriman')->where('id_user', $id_user)->get();
    return view('profile', [
     'pembelian' => $pembelian
    ]);
   } else {
    return redirect()->back();
   }
  } else {
   return redirect()->back();
  }
 }
 // update foto pada profile user
 public function updatefoto(Request $request)
 {
  $checked = Validator::make($request->all(), [
   'fotouser' => 'required',
  ]);
  if ($checked->fails()) {
   return redirect()->back()->withInput()->with('error', 'File upload Kosong');
  } else {
   $IdUser     = auth('user')->user()->id;
   $fotolama   = auth('user')->user()->foto;
   $resorce    = $request->fotouser;
   $namafoto   = "USER-" . date("YmdHis");
   $fileExp    = $resorce->getClientOriginalExtension();
   $ekstensi   = strtolower($fileExp);
   $filediperbolehkan = array('jpg', 'jpeg', 'png');
   if (in_array($ekstensi, $filediperbolehkan) === true) {
    // unlink foto lama untuk menghapus foto lama agar file tidak penuh
    if ($fotolama != "MainUserUploadFrist.png") {
     unlink(\public_path() . "/images/user/" . $fotolama);
    }
    // mengubah nama foto terlebih dahulu
    $fotouser = $namafoto . "." . $fileExp;
    $data = User::where('id', $IdUser)->update([
     'foto' => $fotouser
    ]);
    if ($data) {
     $resorce->move(\public_path() . "/images/user", $fotouser);
     return redirect()->back()->withInput()->with('success', 'Foto berhasil terupdate');;
    } else {
     return redirect()->back()->withInput()->with('error', 'Maff file tidak terupdate, Ulangi!');
    }
   } else {
    return redirect()->back()->withInput()->with('error', 'file upload bukan foto, ulangi!');
   }
  }
 }

 public function updatedata(Request $request)
 {
  $validator = Validator::make($request->all(), [
   'nama_depan' => 'required',
   'nama_belakang' => 'required',
  ]);
  if ($validator->fails()) {
   return redirect()->back()->withErrors($validator);
  } else {
   $IdUser = auth('user')->user()->id;
   $data = User::find($IdUser);
   if ($data) {
    $nama_lengkap = $request->nama_depan . " " . $request->nama_belakang;
    $data->nama_depan = $request->nama_depan;
    $data->nama_belakang = $request->nama_belakang;
    $data->nama_lengkap = $nama_lengkap;
    $data->tgl_lahir = $request->tgl_lahir;
    $data->telepon = $request->tlp;
    $data->save();
    return redirect()->back()->with('success', 'Data telah di perbarui');
   }
  }
 }
 public function updatealamat(Request $request)
 {
  $validator = Validator::make($request->all(), [
   'alamat' => 'required',
  ]);
  if ($validator->fails()) {
   return redirect()->back()->withErrors($validator)->withInput();
  } else {
   $IdUser = auth('user')->user()->id;
   $data = User::find($IdUser);
   if ($data) {
    $data->alamat = $request->alamat;
    $data->save();
    return redirect()->back()->with('success', 'Data telah di perbarui');
   }
  }
 }
 // bagian Riwayat belanja User
 public function riwayatbelanja()
 {
  if (Auth::guard('user')->check()) {
   $id_user = Auth::guard('user')->user()->id;
   $pembelian = DB::table('view_pembelian_pengiriman')->where('id_user', $id_user)->get();
   return view('riwayatbelanja', [
    'pembelian' => $pembelian
   ]);
  } else {
   return redirect()->back();
  }
 }
 // bagian notifikasi user
 public function notifikasi()
 {
  if (Auth::guard('user')->check()) {
   $id_user = Auth::guard('user')->user()->id;
   $pembelian = DB::table('view_pembelian_pengiriman')->where('id_user', $id_user)->get();
   return view('notifikasi', [
    'pembelian' => $pembelian
   ]);
  } else {
   return redirect()->back();
  }
 }
}
