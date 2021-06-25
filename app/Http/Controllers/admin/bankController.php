<?php

namespace App\Http\Controllers\admin;

use App\bank;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class bankController extends Controller
{

 public function index()
 {
  // Cek apakah admin suah login?
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }
  // Mengambil Data Bank
  $bank = bank::all();
  return view('admin.bank', [
   'bank' => $bank
  ]);
 }

 public function tambahbank()
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }

  return view('admin.banktambah');
 }

 public function insertbank(Request $request)
 {
  $validation = Validator::make($request->all(), ['namabank' => 'required', 'norekening' => 'required',]);
  if ($validation->fails()) {
   return redirect()->back()->withErrors($validation);
  } else {
   $nmbank = $request->namabank;
   if ($nmbank === "BCA") {
    $deskripsi = "Bank Central Asia";
   } elseif ($nmbank === "MANDIRI") {
    $deskripsi = "Mandiri";
   } elseif ($nmbank === "BNI") {
    $deskripsi = "Bank Negara Indonesia";
   } elseif ($nmbank === "BRI") {
    $deskripsi = "Bank Rakyat Indonesia";
   }
   $data = bank::create([
    'nama_bank' => $request->namabank,
    'deskripsi' => $deskripsi,
    'nomor_rekening' => $request->norekening
   ]);
   if ($data) {
    return redirect()->route('bank')->with('success', 'Data berhasil di simpan');
   } else {
    return redirect()->route('bank')->with('failed', 'Data gagal di simpan');
   }
  }
 }

 public function ubahbank($id)
 {
  if ($id) {
   $data = bank::where('id_bank', $id)->first();
   return view('admin.bankubah', ['bank' => $data]);
  } else {
   return redirect()->back();
  }
 }
 public function updatebank(Request $request)
 {
  $validation = Validator::make($request->all(), [
   'idbank' => 'required',
   'namabank' => 'required',
   'norekening' => 'required',
  ]);

  if ($validation->fails()) {
   return redirect()->back()
    ->withErrors($validation);
  } else {
   $id_bank = $request->idbank;
   $nmbank = $request->namabank;
   if ($nmbank === "BCA") {
    $deskripsi = "Bank Central Asia";
   } elseif ($nmbank === "MANDIRI") {
    $deskripsi = "Mandiri";
   } elseif ($nmbank === "BNI") {
    $deskripsi = "Bank Negara Indonesia";
   } elseif ($nmbank === "BRI") {
    $deskripsi = "Bank Rakyat Indonesia";
   }
   $data = bank::where('id_bank', $id_bank)->update([
    'nama_bank' => $request->namabank,
    'deskripsi' => $deskripsi,
    'nomor_rekening' => $request->norekening
   ]);
   if ($data) {
    return redirect()->route('bank')
     ->with('success', 'Data bank berhasil diubah');
   } else {
    return redirect()->route('bank')
     ->with('failed', 'Data gagal diubah ulangi nanti!');
   }
  }
 }
}
