<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\produk;
use App\ulasanproduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;

class messageController extends Controller
{
    use WithPagination;
    // tampilkan form message
    public function index()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('index');
        }
        $ulasan = DB::table('view_ulasan_produk')->paginate(12);
        return view('admin.pesan', [
            'ulasan' => $ulasan
        ]);
    }
    public function read($id)
    {
        $notif = session()->get('message');
        unset($notif[$id]);
        session()->put('message', $notif);
        
        $ulasan = DB::table('view_ulasan_produk')->where('id_ulasan', $id)->first();
        $produk = produk::where('id_produk', $ulasan->id_produk)->first();
        return view('admin.bacapesan', [
            'ulasan' => $ulasan,
            'produk' => $produk
        ]);
    }
    public function send(Request $request)
    {
        $check = Validator::make($request->all(), [
            'idulasan' => 'required',
            'balasan' => 'required'
        ]);
        if ($check->fails()) {
            return redirect()->back()->withErrors($check)->withInput();
        } else {
            $balas = ulasanproduk::where('id_ulasan', $request->idulasan)->update([
                'balasan' => $request->balasan
            ]);
            if ($balas) {
                return redirect()->route('admin.message')->with('success', 'Pesan ulasan produk telah dikirim');
            } else {
                return redirect()->back()->with('error', 'Maff, data tidak dapat terkirim');
            }
        }
    }
}
