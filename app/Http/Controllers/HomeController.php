<?php

namespace Sembako\Http\Controllers;

use Illuminate\Http\Request;
use Sembako\Role;
use Sembako\User;
use Sembako\Barang;
use Session;
use Image;
use DB;
use Cart;
use Sembako\DetailTransaksi;
use Sembako\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getHome()
    {
        $barangs = Barang::inRandomOrder()->limit(10)->get();
        return view('frontarea.home')->with([
            'barangs' => $barangs,
        ]);
    }

    public function getProduk()
    {
        $barangs = Barang::paginate(15);
        return view('frontarea.produk')->with([
            'barangs' => $barangs,
        ]);
    }

    public function getKeranjang()
    {
        // $rowId = Cart::search(function ($cartItem, $rowId) {
        //     return $cartItem->id === 2;
        // })->first()->rowId;

        // Cart::remove($rowId);

        $keranjangs = Cart::content();

        // dd($keranjangs);
        return view('frontarea.keranjang')->with([
            'keranjangs' => $keranjangs,
        ]);
    }

    public function tambahKeranjang($id)
    {
        $barang = Barang::find($id);

        Cart::add([
            'id' => $barang->id,
            'name' => $barang->nm_barang,
            'qty' => 1,
            'price' => $barang->harga,
            'options' => [
                'satuan' => $barang->satuan->nm_satuan
            ],
        ]);

        $keranjangs = Cart::content();

        return redirect()->route('keranjang');
    }

    public function ubahKeranjang(Request $request)
    {
        $produks = [];
        $panjang = count($request->id);

        for ($i=0; $i < $panjang ; $i++) { 
            $produks[$i]['id'] = $request->id[$i];
            $produks[$i]['qty'] = $request->qty[$i];
        }

        foreach ($produks as $produk) {
            $rowId = Cart::search(function ($cartItem, $rowId) use ($produk) {
                $id = (int)$produk['id'];
                return $cartItem->id === $id;
            })->first()->rowId;
            Cart::update($rowId, $produk['qty']);
        }

        return redirect()->back();
    }

    public function hapusKeranjang($id)
    {
        $rowId = Cart::search(function ($cartItem, $rowId) use ($id) {
            $id = (int)$id;
            return $cartItem->id === $id;
        })->first()->rowId;

        Cart::remove($rowId);
        
        return redirect()->back();
    }

    public function getPembayaran()
    {
        $keranjang = Cart::content();
        return view('frontarea.pembayaran')->with([
            'keranjang' => $keranjang
        ]);
    }

    public function postPembayaran(Request $request)
    {
        if ($request->term) {

            $this->validate($request, [
                'metode' => 'required',
            ], [
                'metode.required' => 'Pilih metode pembayaran terlebih dahulu!',
            ]);    

            $detail = [];
            $cart = Cart::content();
            $count = count($cart);

            foreach ($cart as $key => $item) {
                $detail[$key]['barang_id'] = $item->id;
                $detail[$key]['qty'] = (int)$item->qty;
                $detail[$key]['harga'] = (int)$item->price;
                $detail[$key]['subtotal'] = (int)$item->subtotal;
            }

            $metode = $request->metode;
            $userid = Auth::user()->id;
            $tanggal = Carbon::now()->toDateString();
            $status = 0;
            $totbay = (int)Cart::total()+5000;

            $transaksi = new Transaksi;
            $transaksi->user_id = $userid;
            $transaksi->tgl = $tanggal;
            $transaksi->metode = $metode;
            $transaksi->total_bayar = $totbay;
            $transaksi->status = $status;
            $transaksi->save();

            foreach ($detail as $item) {
                $transaksi->detail()->save(new DetailTransaksi($item));
                DB::table('barangs')->where('id', $item['barang_id'])->update([
                    'qty' => $item['qty'],
                ]);
            }

            foreach ($cart as $item) {
                $id = (int)$item->id;
                $rowId = Cart::search(function ($cartItem, $rowId) use ($id) {
                    return $cartItem->id === $id;
                })->first()->rowId;

                Cart::remove($rowId);
            }    
            
            Session::flash('success', 'Terima kasih telah menggunakan Kadai Sembako, transaksi anda akan diproses dalam 1x24 jam.');

            return redirect()->back();
        }

        Session::flash('alert', 'Anda harus menyetujui syarat dan ketentuan terlebih dahulu!');

        return redirect()->back();        
    }

    public function getLogin()
    {
        return view('akun.login')->with([
            'bannerTitle' => 'Masuk',
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

    public function getRegister()
    {
        return view('akun.daftar')->with([
            'bannerTitle' => 'Daftar Akun',
        ]);
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

        $pelangganRole = Role::where('nama', 'Pelanggan')->first();

        $user->assignRole($pelangganRole);

        Session::flash('success', 'Akun berhasil dibuat ! Silahkan login untuk mulai belanja !');

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();

        Session::flash('success', 'Anda berhasil logout ! Terima kasih telah belanja menggunakan kadai-sembako.id');

        return redirect()->route('login');
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
