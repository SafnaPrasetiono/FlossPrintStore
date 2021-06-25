<?php

namespace App\Http\Controllers\admin;

use App\admins;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class profileController extends Controller
{
 public function index()
 {
  // cek apakah admin telah login?
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }
  return view('admin.profile');
 }

 public function updatedata(Request $request)
 {
  $checked = validator::make($request->all(), [
   'nama_depan' => 'required',
   'nama_belakang' => 'required',
   'telepon' => 'required',
   'tgl_lahir' => 'required',
  ]);
  if ($checked->fails()) {
   return redirect()->back()->with('error', 'Maaf, data tidak terupdate');
  } else {
   $idadmin = auth('admin')->user()->id;
   $update = admins::where('id', $idadmin)->update([
    'nama_depan' => $request->nama_depan,
    'nama_belakang' => $request->nama_belakang,
    'telepon' => $request->telepon,
    'tgl_lahir' => $request->tgl_lahir
   ]);
   if ($update) {
    return redirect()->back()->with('success', 'Data Profile berhasil diubah');
   } else {
    return redirect()->back()->with('error', 'Maaf, data tidak dapat diproses ulangi nanti!');
   }
  }
 }

 public function updatefoto(Request $request)
 {
  $checked = Validator::make($request->all(), [
   'fotoadmin' => 'required',
  ]);
  if ($checked->fails()) {
   return redirect()->back()->withInput()->with('error', 'Foto tidak boleh kosong');
  } else {
   // cek extensi gambar yang di perbolehkan
   $gambar = validator::make($request->all(), [
    'fotoadmin' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
   ]);
   if ($gambar->fails()) {
    return redirect()->back()->with('error', 'Upload gagal, file bukan foto!');
   }
   $idadmin = auth('admin')->user()->id;
   $fotolama = auth('admin')->user()->foto;
   if ($fotolama != "MainUserUploadFrist.png") {
    unlink(\public_path() . "/images/admin/" . $fotolama);
   }
   $resorce = $request->fotoadmin;
   $namafoto = "ADMIN-" . date("YmdHis");
   $extensifoto = $resorce->getClientOriginalExtension();
   $fotoadmin =  $namafoto . "." . $extensifoto;
   $data = admins::where('id', $idadmin)->update([
    'foto' => $fotoadmin
   ]);
   if ($data) {
    $resorce->move(\public_path() . "/images/admin", $fotoadmin);
    return redirect()->back()->with('success', 'Foto berhasil terupdate');;
   } else {
    return redirect()->back()->with('error', 'Maff file tidak terupdate, Ulangi!');
   }
  }
 }
}
