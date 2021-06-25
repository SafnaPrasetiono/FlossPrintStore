<?php

namespace App\Http\Controllers;

use App\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
 // redirec to home pages
 public function index()
 {
  // load data produk
  $dataproduk = produk::limit(8)->get();
  // menampilkan halaman utama
  return view('home', [
   'dataproduk' => $dataproduk,
  ]);
 }
 // menampilkan bahan pakaian
 public function bahanpakaian()
 {
  return view('bahanpakaian');
 }
 // menampilkan cara belanja
 public function carabelanja()
 {
  return view('carabelanja');
 }
 // menampilkan tentang kami
 public function tentangkami()
 {
  return view('tentangkami');
 }
 // menampilkan syarat ketentuan
 public function syaratketentuan()
 {
  return view('syaratketentuan');
 }
 public function logout()
 {
  if (Auth::guard('user')->check()) {
   Auth::guard('user')->logout();
  }
  return redirect('/');
 }
}
