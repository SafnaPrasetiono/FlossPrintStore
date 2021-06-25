<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\verifikasi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class registerController extends Controller
{
 // show form register
 public function register()
 {
  if (Auth::guard('user')->check()) {
   return redirect()->route('home');
  } else {
   if (session('ver')) {
    return view('register')->with('regist', 'Acount anda belum terverifikasi');
   } else {
    return view('register');
   }
  }
 }

 public function registerpost(request $request)
 {
  $validator = Validator::make($request->all(), [
   'nmDepan' => 'required',
   'nmBelakang' => 'required',
   'email' => 'required|min:4|email|max:255',
   'password' => 'required|min:8|confirmed'
  ]);
  if ($validator->fails()) {
   return redirect()->back()->withErrors($validator)->withInput();
  } else {
   $act = User::where('email', $request->email)->first();
   if ($act != null) {
    if ($act->active === 1) {
     return redirect()->back()->with('error', 'Akun kamu sudah aktif, silahkan login');
    } else {
     $nama_lengkap = $request->nmDepan . " " . $request->nmBelakang;
     $fotos = "MainUserUploadFrist.png";
     $email = $request->email;
     $Vkey = md5(time() . $email);
     $save = User::where('email', $request->email)->update([
      'nama_depan' => $request->nmDepan,
      'nama_belakang' => $request->nmBelakang,
      'nama_lengkap' => $nama_lengkap,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'foto' => $fotos,
      'vkey' => $Vkey,
     ]);
    }
   } else {
    $nama_lengkap = $request->nmDepan . " " . $request->nmBelakang;
    $fotos = "MainUserUploadFrist.png";
    $email = $request->email;
    $Vkey = md5(time() . $email);
    $save = User::create([
     'nama_depan' => $request->nmDepan,
     'nama_belakang' => $request->nmBelakang,
     'nama_lengkap' => $nama_lengkap,
     'email' => $request->email,
     'password' => bcrypt($request->password),
     'foto' => $fotos,
     'vkey' => $Vkey,
    ]);
   }
   if ($save) {
    try {
     Mail::send(
      'mail.aktivasi',
      [
       'nama' => $request->nmDepan,
       'username' => $nama_lengkap,
       'email' => $request->email,
       'key' => $Vkey
      ],
      function ($message) use ($request) {
       $message->subject('Aktivasi Akun');
       $message->from('flossprint71@gmail.com', 'Flossprint');
       $message->to($request->email);
      }
     );
     return redirect()->back()->with('success', 'Aktivasi akun telah dikirim melalui email');
    } catch (Exception $e) {
     User::where('email', $request->email)->delete();
     return redirect()->back()->with('error', 'Maaf, server sedang dalam perbaikan lakukan nanti!');
     // return response(['status' => false, 'errors' => $e->getMessage()]);
    }
   } else {
    return redirect()->back();
   }
  }
 }

 public function aktivasi($id)
 {
  if ($id) {
   $data = User::where('vkey', $id)->first();
   if ($data) {
    $updates = User::where('vkey', $id)->update(['active' => 1]);
    if ($updates) {
     return redirect()->route('user.login')->with('success', 'Aktivasi akun berhasil, silahkan login...');
    } else {
     return redirect()->route('user.login')->with('error', 'Register tidak dapat dilakukan untuk saat ini!');
    }
   } else {
    return redirect()->route('user.register')->with('error', 'Kode aktivasi akun anda salah, ulangi!');
   }
  } else {
   return redirect()->route('user.register')->with('error', 'Tidak ada aktivasi akun');
  }
 }

 public function verifikasi()
 {
  if (session('ver')) {
   return view('verifikasi');
  } else {
   return redirect()->route('home');
  }
 }

 public function verifikasipost(Request $request)
 {
  $validator = Validator::make($request->all(), [
   'kode' => 'required',
  ]);

  if ($validator->fails()) {
   return redirect()->back();
  } else {
   $kode = strtoupper($request->kode);
   $act = '1';

   if (session('ver')) {
    foreach (session('ver') as $data) {
     $nama_depan = $data['nama_depan'];
     $nama_belakang = $data['nama_belakang'];
     $nama_lengkap = $data['nama_lengkap'];
     $email = $data['email'];
     $password = $data['password'];
     $foto = $data['foto'];
     $vkey = $data['vkey'];
    }

    if ($kode === $vkey) {
     $save = User::create([
      'nama_depan' => $nama_depan,
      'nama_belakang' => $nama_belakang,
      'nama_lengkap' => $nama_lengkap,
      'email' => $email,
      'password' => bcrypt($password),
      'foto' => $foto,
      'vkey' => $kode,
      'active' => $act
     ]);
     Auth::guard('user')->loginUsingId($save->id);
     session()->forget('ver');
     return redirect()->route('home');
    } else {
     return redirect()->back()->with('error', 'kode verifikasi anda salah');
    }
   }
  }
 }
}
