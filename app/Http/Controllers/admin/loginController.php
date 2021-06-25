<?php

namespace App\Http\Controllers\admin;

use App\admins;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
 // show login form
 public function login()
 {
  if (Auth::guard('admin')->check()) {
   return redirect()->route('dashboard');
  }
  return view('admin.login');
 }

 public function loginpost(Request $request)
 {
  // make request

  $validation = Validator::make($request->all(), [
   'email' => 'required|min:4|email|max:255',
   'password' => 'required|min:8',
  ]);

  if ($validation->fails()) {
   return redirect()->back()
    ->withInput();
  } else {
   if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
    // if successful, then redirect to their intended location
    //   return redirect()->intended('/admin');
    return redirect()->intended('admin/dashboard');
   } else {
    return redirect()->back()
     ->withInput()
     ->with('email', 'Email dan Password anda salah!');
   }
  }
 }
}
