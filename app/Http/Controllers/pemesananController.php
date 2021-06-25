<?php

namespace App\Http\Controllers;

use App\bank;
use App\pembelian;
use App\pembelianproduk;
use App\pembelianproduksablon;
use App\pengiriman;
use App\produk;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Intervention\Image\ImageManager;

class pemesananController extends Controller
{
 // show keranjang belanja
 public function keranjang()
 {
  return view('keranjangbelanja');
 }

 public function order(Request $request)
 {
  if (session('sablon') or session('cartsablon')) {
   return redirect()->back()->with('error', 'Maff, anda sedang dalam pemesanan sablon');
  }

  $checked = Validator::make($request->all(), [
   'idproduk' => 'required',
   'qty' => 'required|integer'
  ]);

  $produk = produk::where('id_produk', $request->idproduk)->first();

  if (!$produk or empty($produk)) {
   abort(404);
  }

  $cart = session()->get('cart');

  // cek stok produk
  if ($produk->stok <= 0) {
   return redirect()->back()->with('error', 'Maaf, produk tidak dapat dipesan stok kosong!');
  } elseif ($produk->stok < $request->qty) {
   return redirect()->back()->with('error', 'Maaf, anda tidak dapat memesan produk melebihi stok!');
  }

  // if cart is empty then this the first product
  if (isset($cart[$request->idproduk])) {
   // jika produk suda ada di cart maka qty hanya di tambahkan
   $cart[$request->idproduk]['qty'] += $request->qty;
   session()->put('cart', $cart);
   return redirect()->back()->with('keranjang', 'produk masuk ke keranjang');
  } else {
   $produkorder = produk::where('id_produk', $request->idproduk)->get();
   foreach ($produkorder as $p) {
    $cart[$request->idproduk] = [
     'qty' => $request->qty,
     'idproduk' => $p->id_produk,
     'namaproduk' => $p->namaproduk,
     'jenisproduk' => $p->jenis,
     'ukuranproduk' => $p->ukuran,
     'panjang' => $p->panjang,
     'lebar' => $p->lebar,
     'stok' => $p->stok,
     'berat' => $p->berat,
     'hargaproduk' => $p->harga,
     'fotoproduk' => $p->samplefoto,
    ];
   }
   session()->put('cart', $cart);
   return redirect()->back()->with('success', 'produk masuk ke keranjang');
  }
 }

 public function updateorder(Request $request)
 {
  if (session('sablon') or session('cartsablon')) {
   return redirect()->back()->with('error', 'Maff, anda sedang dalam pemesanan sablon');
  }

  $checked = Validator::make($request->all(), [
   'idproduk' => 'required',
   'qty' => 'required'
  ]);

  if ($checked->fails()) {
   return redirect()->back();
  } else {
   $cart = session()->get('cart');
   //KEMUDIAN LOOPING DATA PRODUCT_ID, KARENA NAMENYA ARRAY PADA VIEW SEBELUMNYA
   //MAKA DATA YANG DITERIMA ADALAH ARRAY SEHINGGA BISA DI-LOOPING
   foreach ($request->idproduk as $key => $row) {
    if ($request->qty[$key] == 0) {
     unset($cart[$row]);
    } else {
     $cart[$row]["qty"] = $request->qty[$key];
    }
   }
   session()->put('cart', $cart);
   return redirect()->back();
  }
 }

 public function deleteorder($id)
 {
  if (session('sablon') or session('cartsablon')) {
   return redirect()->back()->with('error', 'Maff, anda sedang dalam pemesanan sablon');
  }
  if (empty($id)) {
   return redirect()->back();
  } else {
   $cart = session()->get('cart');

   unset($cart[$id]);
   //SET KEMBALI COOKIE-NYA SEPERTI SEBELUMNYA
   session()->put('cart', $cart);
   //DAN STORE KE BROWSER.
   if (count(session('cart')) === 0) {
    return redirect()->route('keranjang')->with('success', 'produk telah terhapus');
   } else {
    return redirect()->back()->with('error', 'produk telah terhapus');
   }
  }
 }


 public function checkout()
 {
  // untuk memilih metode pembayaran
  $bank = bank::all();
  // mencari harga ongkir dengan provinsi tertentu
  $provinsi = RajaOngkir::provinsi()->all();
  // apa user sudah login?
  if (Auth::guard('user')->check()) {
   if (session('cart') or session('cartsablon')) {
    return view('checkout', [
     'bank' => $bank,
     'provinsi' => $provinsi
    ]);
   } else {
    return redirect()->back();
   }
  } else {
   return redirect()->route('loginuser');
  }
 }

 public function get_kota($id)
 {
  // $kota = RajaOngkir::kota()->all();
  $data_kota = RajaOngkir::kota()->dariProvinsi($id)->get();
  return json_encode($data_kota);
 }

 public function get_ongkir($destination, $weight, $courier)
 {

  $data_ongkir = RajaOngkir::ongkosKirim([
   'origin'        => 152,     // ID kota/kabupaten asal
   'destination'   => $destination,      // ID kota/kabupaten tujuan
   'weight'        => $weight,    // berat barang dalam gram
   'courier'       => $courier    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
  ])->get();

  // dd($data_ongkir);

  return json_encode($data_ongkir);
 }

 public function prosescheckout(Request $request)
 {
  $checked = Validator::make($request->all(), [
   'telepon' => 'required',
   'alamat' => 'required',
   'province_id' => 'required',
   'kota_id' => 'required',
   'kurir' => 'required',
   'layanan' => 'required',
   'id_bank' => 'required',
  ]);

  if ($checked->fails()) {
   return redirect()->back()->withErrors($checked);
  } else {
   // mendapat kan id user, id_province, id_kota, layanan dan id_bank
   $id_user = auth('user')->user()->id;
   $id_province = $request->province_id;
   $id_kota = $request->kota_id;
   $id_layanan = $request->layanan;
   $id_bank = $request->id_bank;
   // jika telepon user berbeda maka di update
   if (auth('user')->user()->tlp != $request->telepon) {
    $tlpUser = User::find($id_user);
    $tlpUser->telepon = $request->telepon;
    $tlpUser->save();
   }
   // jika alamat user berbeda maka di update
   if (auth('user')->user()->alamat != $request->alamat) {
    $alamatUser = User::find($id_user);
    $alamatUser->alamat = $request->alamat;
    $alamatUser->save();
   }
   // abil nama provinsi dan kota pengiriman
   $provinsi = RajaOngkir::provinsi()->find($id_province);
   $kota = RajaOngkir::kota()->find($id_kota);
   // mendapatkan nilai dari ongkir API
   $provinsiTujuan = $provinsi['province'];
   $kotaTujuan = $kota['city_name'];
   $kodepos = $kota['postal_code'];
   $kurir = $request->kurir;
   // ambil data produk yang di belanjakan untuk mendapatkan total harga
   $subtotal = 0;
   $beratproduk = 0;
   if (session('cart')) {
    foreach (session('cart') as $row) {
     $subtotal += $row['hargaproduk'] * $row['qty'];
     $beratproduk += $row['berat'] * $row['qty'];
    }
   } elseif (session('cartsablon')) {
    foreach (session('cartsablon') as $row) {
     $subtotal += $row['hargaproduk'] * $row['qty'];
     $beratproduk += $row['berat'] * $row['qty'];
    }
   }
   // mendapatkan harga ongkir dari raja ongkir API
   $ongkir = RajaOngkir::ongkosKirim([
    'origin'        => 152,     // ID kota/kabupaten asal
    'destination'   => $id_kota,      // ID kota/kabupaten tujuan
    'weight'        => $beratproduk,    // berat barang dalam gram
    'courier'       => $kurir    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
   ])->get();
   $dekripsilayanan = $ongkir[0]['costs'][$id_layanan]['service'] . ' / ' . $ongkir[0]['costs'][$id_layanan]['description'];
   $hargaongkir = $ongkir[0]['costs'][$id_layanan]['cost'][0]['value'];
   // ongkir ditambah subtotal pembelian
   $grandtotal = $subtotal + $hargaongkir;
   // membuat tanggal pembelian
   $tanggal = date('Y-m-d');
   // memeasukan data ke pembelian
   if (session('cart')) {
    $pembelian = pembelian::insertGetId([
     'tipe' => 'pemesanan-produk',
     'harga' => $grandtotal,
     'tanggal' => $tanggal,
     'status' => 'pending',
     'id_user' => $id_user,
     'id_bank' => $id_bank,
    ]);
   } elseif (session('cartsablon')) {
    $pembelian = pembelian::insertGetId([
     'tipe' => 'pemesanan-sablon',
     'harga' => $grandtotal,
     'tanggal' => $tanggal,
     'status' => 'pending',
     'id_user' => $id_user,
     'id_bank' => $id_bank,
    ]);
   }
   if ($pembelian) {
    if (session('cart')) {
     foreach (session('cart') as $data) {
      $id_produk = $data['idproduk'];
      $jumlah = $data['qty'];
      pembelianproduk::create([
       'id_produk' => $id_produk,
       'namaproduk' => $data['namaproduk'],
       'jenisproduk' => $data['jenisproduk'],
       'ukuranproduk' => $data['ukuranproduk'],
       'panjang' => $data['panjang'],
       'lebar' => $data['lebar'],
       'beratproduk' => $row['berat'] * $row['qty'],
       'jumlah' => $data['qty'],
       'hargaproduk' => $data['hargaproduk'],
       'totalharga' => $data['hargaproduk'] * $data['qty'],
       'id_pembelian' => $pembelian,
       'id_ulasan' => 0,
      ]);
      // update stok dan terjual produk pada table produk
      $pr = produk::find($id_produk);
      $jumlah_brang_dibeli = $pr["stok"] - $jumlah;
      $terjual = $pr['terjual'] + $jumlah;
      produk::where('id_produk', $id_produk)->update([
       'stok' => $jumlah_brang_dibeli,
       'terjual' => $terjual
      ]);
     }
    } elseif (session('cartsablon')) {
     $NFD = date('YmdHis') . 'fotodepan.png';
     $NFB = date('YmdHis') . 'fotobelakang.png';
     foreach (session('cartsablon') as $dtp) {
      pembelianproduksablon::create([
       'bahan' => $dtp['bahan'],
       'warnapakaian' => $dtp['warnapakaian'],
       'tipesablon' => $dtp['tipesablon'],
       'jumlah' => $dtp['qty'],
       'ukuran' => $dtp['ukuranproduk'],
       'panjang' => $dtp['panjang'],
       'lebar' => $dtp['lebar'],
       'berat' => $dtp['berat'] * $dtp['qty'],
       'harga' => $dtp['hargaproduk'],
       'totalharga' => $dtp['hargaproduk'] * $dtp['qty'],
       'foto_depan' => $NFD,
       'foto_belakang' => $NFB,
       'id_pembelian' => $pembelian,
      ]);
      $imageFront = file_get_contents($dtp['fotodepan']);
      file_put_contents(public_path('images/sablon/' . $NFD), $imageFront);
      $imageBack = file_get_contents($dtp['fotobelakang']);
      file_put_contents(public_path('images/sablon/' . $NFB), $imageBack);
     }
    }
   }
   // memasukan data pengiriman
   pengiriman::create([
    'provinsi' => $provinsiTujuan,
    'kota' => $kotaTujuan,
    'alamat' => $request->alamat,
    'kodepos' => $kodepos,
    'expedisi' => $kurir,
    'layanan' => $dekripsilayanan,
    'harga' => $hargaongkir,
    'id_pembelian' => $pembelian
   ]);
   // menghapus session cart
   if (session('cart')) {
    session()->forget('cart');
   } elseif (session('cartsablon')) {
    session()->forget('sablon');
    session()->forget('cartsablon');
   }
   // redirect ke nota
   return redirect()->route('nota', ['id' => $pembelian]);
  }
 }
}
