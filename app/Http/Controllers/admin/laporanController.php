<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class laporanController extends Controller
{
 // show index
 public function index()
 {
  return view('admin.laporan');
 }
 public function data(Request $request)
 {
  if ($request->jenis === "pemesanan-semua") {
   $tglmulai = $request->tglmulai;
   $tglakhir = $request->tglakhir;
   $jenis = "Semua Data Pemesanan";
   $laporan = DB::table('view_pembelian_users')->whereBetween('tanggal', [$tglmulai, $tglakhir])->get();
  } else {
   $tglmulai = $request->tglmulai;
   $tglakhir = $request->tglakhir;
   $jenis = $request->jenis;
   $laporan = DB::table('view_pembelian_users')->where('tipe', $jenis)
    ->whereBetween('tanggal', [$tglmulai, $tglakhir])->get();
  }
  return view('admin.laporan', [
   'datalaporan' => $laporan,
  ]);
 }

 public function cetak(Request $request)
 {
  if ($request->jenis === "pemesanan-semua") {
   $tglmulai = $request->tglmulai;
   $tglakhir = $request->tglakhir;
   $jenis = "Data Pemesanan";
   $laporan = DB::table('view_pembelian_users')->whereBetween('tanggal', [$tglmulai, $tglakhir])->get();
  } else {
   $tglmulai = $request->tglmulai;
   $tglakhir = $request->tglakhir;
   $jenis = $request->jenis;
   $laporan = DB::table('view_pembelian_users')->where('tipe', $jenis)->whereBetween('tanggal', [$tglmulai, $tglakhir])->get();
  }
  $pdf = PDF::loadView('admin.documents.pdf', [
   'datalaporan' => $laporan,
   'tglmulai' => $tglmulai,
   'tglakhir' => $tglakhir,
   'jenis' => $jenis,
  ])->setPaper('A4', 'potrait');
  return $pdf->download('laporan-pemesanan.pdf');
 }
}
