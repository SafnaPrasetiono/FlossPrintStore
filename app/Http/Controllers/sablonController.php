<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class sablonController extends Controller
{
 public function render(Request $request)
 {
  $sablon = session()->get('sablon');
  if ($request->imgFront) {
   $sablon[0] = [
    'imgFront' => $request->imgFront
   ];
   session()->put('sablon', $sablon);
  }
  if ($request->imgBack) {
   $sablon[0] += [
    'imgBack' => $request->imgBack
   ];
   session()->put('sablon', $sablon);
  }
 }
 public function sablon()
 {
  // session()->forget('sablon');
  // dd(session('sablon'));
  if (session('cart')) {
   return redirect()->back()->with('error', 'Maff, anda sedang dalam pemesanan produk');
  } else {
   return view('pemesanansablon');
  }
 }
 public function pemesanansablon(Request $request)
 {
  if (session('cart')) {
   return redirect()->back()->with('error', 'Maff, anda sedang dalam pemesanan sablon');
  }
  $checked = Validator::make($request->all(), [
   'tipesablon' => 'required',
   'ukuran' => 'required',
   'jumlah' => 'required',
  ]);
  if ($checked->fails()) {
   return redirect()->back()->with('error', 'Pastikan data lengkap!');
  } else {
   $cartsablon = session()->get('cartsablon');
   if ($request->ukuran == 'S') {
    $panjang = '58';
    $lebar = '53';
    $berat = '90';
   } elseif ($request->ukuran == 'M') {
    $panjang = '60';
    $lebar = '55';
    $berat = '90';
   } elseif ($request->ukuran == 'L') {
    $panjang = '62';
    $lebar = '56';
    $berat = '95';
   } elseif ($request->ukuran == 'XL') {
    $panjang = '64';
    $lebar = '57';
    $berat = '95';
   } elseif ($request->ukuran == 'XXL') {
    $panjang = '76';
    $lebar = '58';
    $berat = '100';
   }
   if ($request->bahan === 'combed-20s') {
    if ($request->ukuran == 'S') {
     $harga = 75000;
    } elseif ($request->ukuran == 'M') {
     $harga = 75000;
    } elseif ($request->ukuran == 'L') {
     $harga = 80000;
    } elseif ($request->ukuran == 'XL') {
     $harga = 80000;
    } elseif ($request->ukuran == 'XXL') {
     $harga = 85000;
    }
   } elseif ($request->bahan === 'combed-24s') {
    if ($request->ukuran == 'S') {
     $harga = 72000;
    } elseif ($request->ukuran == 'M') {
     $harga = 72000;
    } elseif ($request->ukuran == 'L') {
     $harga = 78000;
    } elseif ($request->ukuran == 'XL') {
     $harga = 78000;
    } elseif ($request->ukuran == 'XXL') {
     $harga = 82000;
    }
   } elseif ($request->bahan === 'combed-30s') {
    if ($request->ukuran == 'S') {
     $harga = 70000;
    } elseif ($request->ukuran == 'M') {
     $harga = 70000;
    } elseif ($request->ukuran == 'L') {
     $harga = 75000;
    } elseif ($request->ukuran == 'XL') {
     $harga = 75000;
    } elseif ($request->ukuran == 'XXL') {
     $harga = 80000;
    }
   } elseif ($request->bahan === 'cotton-bambo') {
    if ($request->ukuran == 'S') {
     $harga = 75000;
    } elseif ($request->ukuran == 'M') {
     $harga = 75000;
    } elseif ($request->ukuran == 'L') {
     $harga = 80000;
    } elseif ($request->ukuran == 'XL') {
     $harga = 80000;
    } elseif ($request->ukuran == 'XXL') {
     $harga = 85000;
    }
   }

   if ($request->fotoDepan and $request->fotoBelakang) {
    $color = Validator::make($request->all(), ['color' => 'required']);
    if ($color->fails()) {
     return redirect()->back()->with('error', 'Warna Pakaian belum dipilih');
    }
    $checkfoto = Validator::make($request->all(), [
     'fotoDepan.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if ($checkfoto->fails()) {
     return redirect()->back()->with('error', 'Data Foto Harus Terisi Satu');
    } else {
     $data1 = file_get_contents($request->fotoDepan);
     $data2 = file_get_contents($request->fotoBelakang);
     $fotoDepan =  'data:image/png;base64,' . base64_encode($data1);
     $fotoBelakang = 'data:image/png;base64,' . base64_encode($data2);
     $cartsablon[0] = [
      'qty' => $request->jumlah,
      'bahan' => $request->bahan,
      'warnapakaian' => $request->color,
      'tipesablon' => $request->tipesablon,
      'ukuranproduk' => $request->ukuran,
      'panjang' => $panjang,
      'lebar' => $lebar,
      'berat' => $berat,
      'hargaproduk' => $harga,
      'fotodepan' => $fotoDepan,
      'fotobelakang' => $fotoBelakang,
     ];
     session()->put('cartsablon', $cartsablon);
     session()->forget('sablon');
     return redirect()->route('checkout');
    }
   } elseif ($request->fotoDepan) {
    $color = Validator::make($request->all(), ['color' => 'required']);
    if ($color->fails()) {
     return redirect()->back()->with('error', 'Warna Pakaian belum dipilih');
    }
    $checkfoto = Validator::make($request->all(), [
     'fotoDepan.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if ($checkfoto->fails()) {
     return redirect()->back()->with('error', 'Data Foto Harus Terisi Satu');
    } else {
     // $imagefailed = url('/images/Failed/nofile.png');
     $data1 = file_get_contents($request->fotoDepan);
     $data2 = file_get_contents('images/Failed/nofile.png');
     $fotoFront =  'data:image/png;base64,' . base64_encode($data1);
     $fotoBelakang = 'data:image/png;base64,' . base64_encode($data2);
     $cartsablon[0] = [
      'qty' => $request->jumlah,
      'bahan' => $request->bahan,
      'warnapakaian' => $request->color,
      'tipesablon' => $request->tipesablon,
      'ukuranproduk' => $request->ukuran,
      'panjang' => $panjang,
      'lebar' => $lebar,
      'berat' => $berat,
      'hargaproduk' => $harga,
      'fotodepan' => $fotoFront,
      'fotobelakang' => $fotoBelakang,
     ];
     session()->put('cartsablon', $cartsablon);
     session()->forget('sablon');
     return redirect()->route('checkout');
    }
   } elseif ($request->fotoBelakang) {
    $color = Validator::make($request->all(), ['color' => 'required']);
    if ($color->fails()) {
     return redirect()->back()->with('error', 'Warna Pakaian belum dipilih');
    }
    $checkfoto = Validator::make($request->all(), [
     'fotoBelakang.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if ($checkfoto->fails()) {
     return redirect()->back()->with('error', 'Data Foto Harus Terisi Satu');
    } else {
     $data1 = file_get_contents('images/Failed/nofile.png');
     $data2 = file_get_contents($request->fotoBelakang);
     $fotoDepan =  'data:image/png;base64,' . base64_encode($data1);
     $fotoBelakang = 'data:image/png;base64,' . base64_encode($data2);
     $cartsablon[0] = [
      'qty' => $request->jumlah,
      'bahan' => $request->bahan,
      'warnapakaian' => $request->color,
      'tipesablon' => $request->tipesablon,
      'ukuranproduk' => $request->ukuran,
      'panjang' => $panjang,
      'lebar' => $lebar,
      'berat' => $berat,
      'hargaproduk' => $harga,
      'fotodepan' => $fotoDepan,
      'fotobelakang' => $fotoBelakang,
     ];
     session()->put('cartsablon', $cartsablon);
     session()->forget('sablon');
     return redirect()->route('checkout');
    }
   } else {
    if (session('sablon')) {
     foreach (session('sablon') as $foto) {
      $cartsablon[0] = [
       'qty' => $request->jumlah,
       'bahan' => $request->bahan,
       'warnapakaian' => 'sesuai desain',
       'tipesablon' => $request->tipesablon,
       'ukuranproduk' => $request->ukuran,
       'panjang' => $panjang,
       'lebar' => $lebar,
       'berat' => $berat,
       'hargaproduk' => $harga,
       'fotodepan' => $foto['imgFront'],
       'fotobelakang' => $foto['imgBack'],
      ];
     }
     session()->put('cartsablon', $cartsablon);
     session()->forget('sablon');
     return redirect()->route('checkout');
    } else {
     return redirect()->back()->with('error', 'Foto desain tidak boleh kosong');
    }
   }
  }
 }

 public function hapussablon()
 {
  if (session('sablon')) {
   session()->forget('sablon');
   return redirect()->back()->with('success', 'Desain Sablon anda telah terhapus');
  } else {
   return redirect()->back();
  }
 }
 public function sablonbatal()
 {
  if (session('cartsablon')) {
   session()->forget('cartsablon');
   return redirect()->route('index')->with('success', 'Anda telah membatalkan pemesanan sablon');
  } else {
   return redirect()->route('index');
  }
 }
}
