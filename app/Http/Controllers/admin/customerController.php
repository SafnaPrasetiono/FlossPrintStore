<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class customerController extends Controller
{
 use WithPagination;
 // show costumer pages
 public function customer(Request $request)
 {
  if (!Auth::guard('admin')->check()) {
   return redirect()->route('index');
  }
  if ($request->srcuser) {
   // load form database
   $customer = User::where('nama_lengkap', 'like', '%' . $request->srcuser . '%')->paginate(12);
  } else {
   // load form database
   $customer = User::paginate(12);
  }
  return view('admin.pelanggan', [
   'pelanggan' => $customer
  ]);
 }
}
