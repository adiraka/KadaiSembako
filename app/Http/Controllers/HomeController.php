<?php

namespace Sembako\Http\Controllers;

use Illuminate\Http\Request;
use Sembako\Role;
use Sembako\User;
use Session;
use Image;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getHome()
    {
        return view('frontarea.home')->with([
            
        ]);
    }

    public function getProduk()
    {
        return view('frontarea.produk')->with([
            'bannerTitle' => 'Produk',
        ]);
    }

    public function getLogin()
    {
        return view('login.index')->with([
            'bannerTitle' => 'User Akun',
        ]);
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Kolom email tidak boleh kosong !',
            'email.email' => 'Format email yang anda masukkan tidak valid !',
            'password.required' => 'Kolom password tidak boleh kosong !',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            if (Auth::check()) {
                if (Auth::user()->roles->first()->nama == 'Admin') {
                    return redirect()->route('adminHome');
                } else if (Auth::user()->roles->first()->nama == 'Pelanggan') {
                    Session::flash('success', 'Anda berhasil login ! Selamat datang '.Auth::user()->email.' !');
                    return redirect()->route('home');
                }
            }
            
        }

        Session::flash('alert', 'Silahkan cek kembali email dan password anda !');
        
        return redirect()->route('akun');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'nama' => 'required',
            'tmplahir' => 'required',
            'tgllahir' => 'required',
            'jekel' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ], [
            'email.required' => 'Kolom email tidak boleh kosong !',
            'email.unique' => 'Email yang anda gunakan sudah terdaftar !',
            'email.email' => 'Format email yang anda masukkan tidak valid !',
            'password.required' => 'Kolom password tidak boleh kosong !',
            'password_confirmation.required' => 'Kolom konfirmasi password tidak boleh kosong !',
            'password_confirmation.same' => 'Password yang diinputkan tidak cocok !',
            'nama.required' => 'Kolom nama tidak boleh kosong',
            'tmplahir.required' => 'Kolom tempat lahir tidak boleh kosong',
            'tgllahir.required' => 'Kolom tanggal lahir tidak boleh kosong',
            'jekel.required' => 'Kolom jenis kelamin tidak boleh kosong',
            'alamat.required' => 'Kolom alamat tidak boleh kosong',
            'telepon.required' => 'Kolom telepon tidak boleh kosong',
        ]);

        $status = 1;

        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->nama = $request->nama;
        $user->tmp_lahir = $request->tmplahir;
        $user->tgl_lahir = $request->tgllahir;
        $user->jekel = $request->jekel;
        $user->alamat = $request->alamat;
        $user->telepon = $request->telepon;
        $user->status = $status;
        $user->save();

        Session::flash('success', 'Akun berhasil dibuat ! Silahkan login untuk mulai belanja !');

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        Session::flash('success', 'Anda berhasil logout ! Terima kasih telah belanja menggunakan kadai-sembako.id');

        return redirect()->route('akun');
    }

    public function test()
    {
        $img = Image::make(file_get_contents('img/logo.jpg'));
        // $img->encode('png');
        dd($img);
        return view('test.index')->with([
            'img' => $img,
        ]);
    }
}
