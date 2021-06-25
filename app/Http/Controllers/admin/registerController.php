<?php

namespace App\Http\Controllers\admin;

use App\admins;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class registerController extends Controller
{
    // show register pages
    public function register()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard');
        }
        return view('admin.register');
    }

    public function registerpost(request $request)
    {
        $validator = Validator::make($request->all(), [
            'nmDepan' => 'required',
            'nmBelakang' => 'required',
            'email' => 'required|min:4|email|unique:admins|max:255',
            'password' => 'required|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $nama_lengkap = $request->nmDepan . " " . $request->nmBelakang;
            $fotos = "MainAdminUploadFrist.png";

            $data = admins::create([
                'nama_depan' => $request->nmDepan,
                'nama_belakang' => $request->nmBelakang,
                'nama_lengkap' => $nama_lengkap,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'foto' => $fotos
            ]);

            if ($data) {
                Auth::guard('admin')->loginUsingId($data->id);
                return redirect()->route('dashboard');
            } else {
                return redirect()->back();
            }
        }

        // // Attempt to log the user in
        // // Passwordnya pake bcrypt
        // if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        //     // if successful, then redirect to their intended location
        //     return redirect()->intended('/admin');
        // } else if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect()->intended('/user');
        // }
    }
}
