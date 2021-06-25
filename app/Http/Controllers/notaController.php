<?php

namespace App\Http\Controllers;

use App\bank;
use App\pembelian;
use App\pembelianproduk;
use App\pembelianproduksablon;
use App\pengiriman;
use App\prosessablon;
use App\ulasanproduk;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class notaController extends Controller
{
    // routing nota haru ada id pembelian
    public function nota($id)
    {

        if (!Auth::guard('user')->check()) {
            abort(404);
        }

        $iduser = auth('user')->user()->id;
        $pembeliancek = pembelian::where('id_pembelian', $id)->first();

        if ($pembeliancek === null) {
            abort(404);
        }

        if ($pembeliancek->id_user != $iduser) {
            abort(404);
        } else {
            $id_bank = $pembeliancek->id_bank;
            $pembelian = pembelian::where('id_pembelian', $id)->first();
            $pengiriman = pengiriman::where('id_pembelian', $id)->get();
            $bank = bank::where('id_bank', $id_bank)->get();
            if ($pembelian->tipe === 'pemesanan-produk') {
                $pembelianproduk = pembelianproduk::where('id_pembelian', $id)->get();
                return view('nota', [
                    'pembelian' => $pembelian,
                    'pembelianproduk' => $pembelianproduk,
                    'pengiriman' => $pengiriman,
                    'bank' => $bank,
                ]);
            } elseif ($pembelian->tipe === 'pemesanan-sablon') {
                $pembelianproduk = pembelianproduksablon::where('id_pembelian', $id)->get();
                $waktuproses = prosessablon::where('id_pembelian', $id)->first();
                return view('nota', [
                    'pembelian' => $pembelian,
                    'pembelianproduk' => $pembelianproduk,
                    'pengiriman' => $pengiriman,
                    'bank' => $bank,
                    'waktuproses' => $waktuproses
                ]);
            } else {
                return redirect()->back()->with('errorshopping', 'Maff terjadi kesalah data');
            }
        }
    }

    public function ulasan(Request $request)
    {
        $check = Validator::make($request->all(), [
            'iduser' => 'required',
            'rating' => 'required',
            'idproduk' => 'required',
            'tanggapan' => 'required'
        ]);

        if ($check->fails()) {
            return redirect()->back()->with('error', 'Maff, proses tanggapan produk gagal');
        } else {
            $pembelian = pembelianproduk::where('id_pembelian_produk', $request->idproduk)->first();
            $idproduk = $pembelian->id_produk;

            $tanggal = date('Y-m-d');
            $saveulasan = ulasanproduk::insertGetId([
                'rating' => $request->rating,
                'tanggapan' => $request->tanggapan,
                'tanggal' => $tanggal,
                'id_produk' => $idproduk,
                'id_user' => $request->iduser
            ]);
            if ($saveulasan) {
                pembelianproduk::where('id_pembelian_produk', $request->idproduk)->update(['id_ulasan' => $saveulasan]);
                return redirect()->back()->with('success', 'Trimakasi, sudah memeberikan tanggapan');
            } else {
                return redirect()->back()->with('error', 'Maaf, terjadi kesalahan Ulangi nanti!');
            }
        }
    }
}
