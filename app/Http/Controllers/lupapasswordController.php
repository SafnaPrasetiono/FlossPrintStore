<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class lupapasswordController extends Controller
{
 // menampilkan halaman lupa password
 public function index()
 {
  return view('lupapassword');
 }

 public function cekemail(Request $request)
 {
  $validator = Validator::make($request->all(), [
   'email' => 'required|min:4|email|max:255',
  ]);
  if ($validator->fails()) {
   return redirect()->back()->withErrors($validator)->withInput();
  } else {
   $cek = User::where('email', $request->email)->first();
   if ($cek === null) {
    return redirect()->back()->with('email', 'Email tidak terdaftar, gunakan email yang aktif');
   } else {
    try {
     $nama = $cek->nama_lengkap;
     $VKEY = md5(time() . $request->email);
     User::where('email', $request->email)->update(['vkey' => $VKEY]);
     Mail::send(
      'mail.mailubahpassword',
      [
       'key' => $VKEY,
       'nama' => $nama,
      ],
      function ($message) use ($request) {
       $message->subject('Ubah Password');
       $message->from('flossprint71@gmail.com', 'Flossprint');
       $message->to($request->email);
      }
     );
     return redirect()->back()->with('success', 'Aktivasi ubah password telah dikirim melalui email');
    } catch (Exception $e) {
     return redirect()->back()->with('error', 'Maaf, server dalam perbaikan ulangi nanti!');
     // return response(['status' => false, 'errors' => $e->getMessage()]);
    }
   }
  }
 }

 public function cekkey($id)
 {
  if (isset($id)) {
   $data = User::where('vkey', $id)->first();
   if ($data != null) {
    $key = $data->vkey;
    $email = $data->email;
    return view('ubahpassword', [
     'key' => $key,
     'email' => $email
    ]);
   } else {
    return redirect()->route('user.lupapassword')->with('error', 'Anda belum menerima aktivasi akun');
   }
   return redirect()->back()->with('success');
  } else {
   return redirect()->back();
  }
 }

 public function ubahpassword(Request $request)
 {
  $validator = Validator::make($request->all(), [
   'password' => 'required|min:8|confirmed'
  ]);
  if ($validator->fails()) {
   return redirect()->back()
    ->withErrors($validator)
    ->withInput();
  } else {
   $cekdata = User::where('vkey', $request->vkey)->first();
   if ($cekdata != null) {
    $realpassword = bcrypt($request->password);
    $udata = User::where('vkey', $request->vkey)->update(['password' => $realpassword]);
    if ($udata) {
     // set kembali vkey
     $email = $cekdata->email;
     $VKEY = md5(time() . $email);
     User::where('email', $email)->update(['vkey' => $VKEY]);
     return redirect()->route('user.login')->with('success', 'Password telah dibuah silahkan login');
    } else {
     return redirect()->route('user.login')->with('error', 'Data anda tidak dapat di proses, ulangi nanti!');
    }
   } else {
    return redirect()->route('user.login')->with('error', 'Terjadi kesalahan data, ulangi nanati!');
   }
  }
 }
}
