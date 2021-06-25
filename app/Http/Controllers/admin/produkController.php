<?php

// Original Coding By        : Safna Prasetiono
// Date Create               : 6 juni 2020 

namespace App\Http\Controllers\admin;

use App\fotoproduk;
use App\Http\Controllers\Controller;
use App\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;

class produkController extends Controller
{
 use WithPagination;
 public function dataproduk(Request $request)
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }

  if ($request->srcproduk) {
   $jumlah_data = count(produk::all());
   // Menampilkan data produk dari database sebanya 12
   $produk = produk::where('namaproduk', 'like', '%' . $request->srcproduk . '%')->paginate(12);
  } else {
   $jumlah_data = count(produk::all());
   // Menampilkan data produk dari database sebanya 12
   $produk = produk::paginate(12);
  }
  return view('admin.dataproduk', [
   'produk' => $produk,
   'jumlah_data' => $jumlah_data
  ]);
 }

 // show tambah produk pages and make insert product
 // this function focus to add product
 public function tambahproduk()
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }

  return view('admin.tambahproduk');
 }
 public function insertproduk(Request $request)
 {
  $validator = Validator::make($request->all(), [
   'namaProduk' => 'required',
   'hargaProduk' => 'required',
   'jumlahProduk' => 'required',
   'jenis' => 'required',
   'ukuran' => 'required',
   'panjang' => 'required|integer',
   'lebar' => 'required|integer',
   'berat' => 'required|integer',
   'deskripsi' => 'required',
   'samplefoto' => 'required',
   'samplefoto.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
   'fotoproduk' => 'required',
   'fotoproduk.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

  ]);
  if ($validator->fails()) {
   return redirect()->back()->withErrors($validator)->withInput();
  } else {
   $tglproduk = date("Y/m/d");
   $resorce = $request->samplefoto;
   $originNamaImages = $resorce->getClientOriginalName();
   $NewNameImage = "IMG-" . substr(md5($originNamaImages . date("YmdHis")), 0, 14);
   $namasamplefoto = $NewNameImage . "." . $resorce->getClientOriginalExtension();
   $dataproduk = produk::insertGetId([
    'namaproduk' => $request->namaProduk,
    'harga' => $request->hargaProduk,
    'stok' => $request->jumlahProduk,
    'terjual' => '0',
    'jenis' => $request->jenis,
    'ukuran' => $request->ukuran,
    'panjang' => $request->panjang,
    'lebar' => $request->lebar,
    'berat' => $request->berat,
    'samplefoto' => $namasamplefoto,
    'tanggal' => $tglproduk,
    'deskripsi' => $request->deskripsi
   ]);
   if ($dataproduk) {
    // memasukan sample foto produk
    $resorce->move(public_path() . "/images/produk/display", $namasamplefoto);
    // ambil id produk pada produk yang baru di insertkan
    // lalu memasukan data foto produk multiple ke table fotoproduk dimana id dari produk tadi
    $ambilidproduk = $dataproduk;
    if ($request->hasFile('fotoproduk')) {
     foreach ($request->file('fotoproduk') as $image) {
      // membuat random key dari tgl n waktu
      $originNamaImages = $resorce->getClientOriginalName();
      $NewNameImage = "IMG-" . substr(md5($originNamaImages . date("YmdHis")), 0, 14);
      $extensiImage = $image->getClientOriginalExtension();
      $sizeImages = $image->getSize();
      // Mengabungkan NewNameImage dan extention file
      $lokasiImages = $NewNameImage . "." . $extensiImage;
      fotoproduk::create([
       'namafoto' => $NewNameImage,
       'ukuran' => $sizeImages,
       'lokasi' => $lokasiImages,
       'id_produk' => $ambilidproduk
      ]);
      $image->move(public_path() . '/images/produk/', $lokasiImages);
     }
    }
    return redirect()->back()->with('success', 'file telah di upload');
   } else {
    return redirect()->back()->with('error', 'Database tidak bisa upload ulangi nanti!')->withInput();
   }
  }
 }
 // show detail produk and make update product
 // this function focus to update product
 public function ubahproduk($id)
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }
  $getproduk = produk::where('id_produk', $id)->get();
  $fotoproduk = fotoproduk::where('id_produk', $id)->get();
  return view('admin.ubahproduk', [
   'produk' => $getproduk,
   'fotoproduk' => $fotoproduk
  ]);
 }
 public function updateproduk(Request $request)
 {
  $validator = Validator::make($request->all(), [
   'idproduk' => 'required',
   'namaProduk' => 'required',
   'hargaProduk' => 'required',
   'jumlahProduk' => 'required',
   'jenis' => 'required',
   'ukuran' => 'required',
   'panjang' => 'required|integer',
   'lebar' => 'required|integer',
   'berat' => 'required|integer',
   'deskripsi' => 'required',
   'samplefoto.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  ]);
  if ($validator->fails()) {
   return redirect()->back()
    ->withErrors($validator);
  } else {
   $tglproduk = date("Y/m/d");
   // update dengan foto produk baru
   if (!empty($request->samplefoto)) {
    // menghapus file foto lama
    $dataft = produk::where('id_produk', $request->idproduk)->first();
    $getfotosamplelama = $dataft->samplefoto;
    // Foto Baru
    $resorce = $request->samplefoto;
    $originNamaImages = $resorce->getClientOriginalName();
    $NewNameImage = "IMG-" . substr(md5($originNamaImages . date("YmdHis")), 0, 14);
    $namasamplefoto = $NewNameImage . "." . $resorce->getClientOriginalExtension();
    $update = produk::where('id_produk', $request->idproduk)->update([
     'namaproduk' => $request->namaProduk,
     'harga' => $request->hargaProduk,
     'stok' => $request->jumlahProduk,
     'jenis' => $request->jenis,
     'ukuran' => $request->ukuran,
     'panjang' => $request->panjang,
     'lebar' => $request->lebar,
     'berat' => $request->berat,
     'samplefoto' => $namasamplefoto,
     'tanggal' => $tglproduk,
     'deskripsi' => $request->deskripsi
    ]);
    if ($update) {
     unlink(public_path() . '/images/produk/display/' . $getfotosamplelama);
     $resorce->move(public_path() . "/images/produk/display/", $namasamplefoto);
     return redirect('/admin/produk/data')->with('successupdate', 'Produk berhasil update');
    } else {
     return redirect()->back()->with('errordb', 'Database tidak bisa upload ulangi nanti!');
    }
   } else {
    // update tanpa foto produk baru
    $update = produk::where('id_produk', $request->idproduk)->update([
     'namaproduk' => $request->namaProduk,
     'harga' => $request->hargaProduk,
     'stok' => $request->jumlahProduk,
     'jenis' => $request->jenis,
     'ukuran' => $request->ukuran,
     'panjang' => $request->panjang,
     'lebar' => $request->lebar,
     'berat' => $request->berat,
     'tanggal' => $tglproduk,
     'deskripsi' => $request->deskripsi
    ]);
    if ($update) {
     return redirect('/admin/produk/data')->with('success', 'Produk berhasil diupdate');
    } else {
     return redirect()->back()->with('error', 'Database tidak bisa upload ulangi nanti!');
    }
   }
  }
 }

 public function hapusproduk($id)
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }
  if (isset($id)) {
   $data = produk::where('id_produk', $id)->first();
   // hapus fotoproduk perulangan
   $fotoproduk = fotoproduk::where('id_produk', $id)->get();
   if ($data) {
    unlink(public_path() . '/images/produk/display/' . $data->samplefoto);
    foreach ($fotoproduk as $img) {
     unlink(public_path() . '/images/produk/' . $img->lokasi);
    }
    produk::where('id_produk', $id)->delete();
    fotoproduk::where('id_produk', $id)->delete();
    return redirect()->back()->with('success', 'Produk telah dihapus');
   } else {
    return redirect()->back()->with('error', 'Produk tidak ditemukan');
   }
  } else {
   return redirect()->back()->with('error', 'id tidak ditemukan');
  }
 }

 // making insert and delete for fotoproduk multiple
 // this function focus to foto produk multiple
 public function tambahfotoproduk(Request $request)
 {
  $valider = Validator::make($request->all(), [
   'idproduk' => 'required',
   'fotoprodukmultiple' => 'required',
   'fotoprodukmultiple.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  ]);
  if ($valider->fails()) {
   return redirect()->back()->with('images', 'File Bukan Gambar');
  } else {
   $idproduk = $request->idproduk;
   foreach ($request->fotoprodukmultiple as $image) {
    $extensiImage = $image->getClientOriginalExtension();
    $originNamaImages = $image->getClientOriginalName();
    $NewNameImage = "IMG-" . substr(md5($originNamaImages . date("YmdHis")), 0, 14);
    $sizeImages = $image->getSize();
    // mengubah nama foto ditambah id-foto tadi
    $lokasiImages = $NewNameImage . "." . $extensiImage;
    fotoproduk::create([
     'namafoto' => $NewNameImage,
     'ukuran' => $sizeImages,
     'lokasi' => $lokasiImages,
     'id_produk' => $idproduk
    ]);
    $image->move(public_path() . '/images/produk/', $lokasiImages);
   }
   return redirect()->back()->with('success', 'Foto berhasil ditambahkan');
  }
 }
 public function hapusfotoproduk($id)
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }
  $getfotolama = fotoproduk::where('id_fotoproduk', $id)->first();
  $fotolama = $getfotolama->lokasi;
  $data = fotoproduk::where('id_fotoproduk', $id)->delete();
  if ($data) {
   unlink(public_path() . '/images/produk/' . $fotolama);
   return redirect()->back()->with('success', 'Foto telah terhapus');
  } else {
   return redirect()->back()->with('error', 'Foto gagal terhapus');
  }
 }
}
