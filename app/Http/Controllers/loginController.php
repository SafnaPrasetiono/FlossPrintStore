<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
 // show login form
 public function login()
 {
  if (Auth::guard('user')->check()) {
   return redirect()->route('home');
  } else {
   return view('login');
  }
 }
 public function loginpost(request $request)
 {
  $checked = Validator::make($request->all(), [
   'email' => 'required|min:4|email|max:255',
   'password' => 'required|min:8',
  ]);
  if ($checked->fails()) {
   return redirect()->back()->withInput();
  } else {
   $data = User::where('email', $request->email)->first();
   if ($data) {
    if (Hash::check($request->password, $data->password)) {
     if ($data->active == 1) {
      Auth::guard('user')->loginUsingId($data->id);
      if (session('cart') or session('cartsablon')) {
       return redirect()->route('checkout');
      } else {
       return redirect()->route('index');
      }
     } else {
      return redirect()->back()->with('error', 'Akun anda belum diaktivasi');
     }
    } else {
     return redirect()->back()->withInput()->with('password', 'Password anda salah!');
    }
   } else {
    return redirect()->back()->withInput()->with('email', 'Email dan Password anda salah!');
   }
  }
 }
}
