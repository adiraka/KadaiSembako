<?php

namespace Sembako\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use Session;
use Sembako\Kategori;
use Sembako\Satuan;
use Sembako\Barang;
use Sembako\Transaksi;
use Sembako\DetailTransaksi;

class AdminController extends Controller
{
    public function getHome()
    {
    	// dd(Auth::user()->roles->first()->nama);
    	return view('backarea.home');
    }

    public function getKategori()
    {
    	$kategoris = Kategori::paginate(10);
    	return view('backarea.kategori.index')->with([
    		'kategoris' => $kategoris,
    	]);
    }

    public function postKategori(Request $request)
    {
    	$this->validate($request, [
    		'nmkategori' => 'required',
    	], [
    		'nmkategori.required' => 'Kolom nama kategori tidak boleh kosong!',
    	]);

    	$kategori = new Kategori;
    	$kategori->nm_kategori = $request->nmkategori;
    	$kategori->save();

    	Session::flash('sukses', 'Data Kategori berhasil ditambahkan!');

    	return redirect()->back();
    }

    public function delKategori(Request $request)
    {
    	$id = $request->id;

    	$kategori = Kategori::find($id);
    	$kategori -> delete();

    	Session::flash('sukses', 'Data Kategori berhasil dihapus');

    	return redirect()->back();    	
    }

    public function getSatuan()
    {
    	$satuans = Satuan::paginate(10);
    	return view('backarea.satuan.index')->with([
    		'satuans' => $satuans,
    	]);
    }

    public function postSatuan(Request $request)
    {
    	$this->validate($request, [
    		'nmsatuan' => 'required',
    	], [
    		'nmsatuan.required' => 'Kolom nama satuan tidak boleh kosong!',
    	]);

    	$satuan = new Satuan;
    	$satuan->nm_satuan = $request->nmsatuan;
    	$satuan->save();

    	Session::flash('sukses', 'Data Satuan berhasil ditambahkan!');

    	return redirect()->back();
    }

    public function delSatuan(Request $request)
    {
    	$id = $request->id;

    	$satuan = Satuan::find($id);
    	$satuan -> delete();

    	Session::flash('sukses', 'Data satuan berhasil dihapus!');

    	return redirect()->back();
    }

    public function getBarang()
    {
    	$kategoris = Kategori::select('id', 'nm_kategori')->get();
    	$satuans = Satuan::select('id', 'nm_satuan')->get();
    	return view('backarea.barang.index')->with([
    		'kategoris' => $kategoris,
    		'satuans' => $satuans,
    	]);
    }

    public function postBarang(Request $request)
    {
    	$this->validate($request, [
    		'kategori_id' => 'required',
    		'nm_barang' => 'required',
    		'qty' => 'required|integer',
    		'satuan_id' => 'required',
    		'harga' => 'required|integer',
    		'keterangan' => 'required',
    	], [
    		'kategori_id.required' => 'Kolom kategori tidak boleh kosong!',
    		'nm_barang.required' => 'Kolom nama barang tidak boleh kosong!',
    		'qty.required' => 'Kolom qty tidak boleh kosong!',
    		'qty.integer' => 'Kolom qty hanya boleh mengandung angka!',
    		'satuan_id.required' => 'Kolom satuan tidak boleh kosong!',
    		'harga.required' => 'Kolom harga tidak boleh kosong!',
    		'harga.integer' => 'kolom harga hanya boleh mengandung angka!',
    		'keterangan.required' => 'kolom keterangan tidak boleh kosong!,' 
    	]);

    	$barang = new Barang;
    	$barang->kategori_id = $request->kategori_id;
    	$barang->satuan_id = $request->satuan_id;
    	$barang->nm_barang = $request->nm_barang;
    	$barang->harga = $request->harga;
    	$barang->qty = $request->qty;
    	$barang->keterangan = $request->keterangan;
    	$barang->save();

    	Session::flash('sukses', 'Data produk berhasil ditambahkan!');

    	return redirect()->back();
    }

    public function dataBarang()
    {
    	$barangs = Barang::paginate(15);
    	return view('backarea.barang.view')->with([
    		'barangs' => $barangs,
    	]);
    }

    public function validasiTransaksi()
    {
        $transaksis = Transaksi::where('status', 0)->orderBy('tgl')->paginate(15);

        return view('backarea.transaksi.validasi')->with([
            'transaksis' => $transaksis,
        ]);
    }

    public function postValidasiTransaksi(Request $request)
    {
        $transaksi = Transaksi::find($request->id);
        $transaksi->status = 1;
        $transaksi->save();

        foreach ($transaksi->detail as $detail) {
            $stokawal = $detail->barang->qty;
            $qty = $detail->qty;

            $stokakhir = $stokawal - $qty;
            $id = $detail->barang_id;
            
            $barang = Barang::find($id);
            $barang->qty = $stokakhir;
            $barang->save();
        }

        Session::flash('success', 'Validasi transaksi berhasil!');

        return redirect()->back();
    }

    public function detailTransaksi($id)
    {
        $transaksi = Transaksi::find($id);

        return view('backarea.transaksi.detail')->with([
            'transaksi' => $transaksi,
        ]);
    }

    public function dataTransaksi()
    {
        $transaksis = Transaksi::where('status', 1)->orderBy('tgl')->paginate(15);

        return view('backarea.transaksi.data')->with([
            'transaksis' => $transaksis,
        ]);
    }
}
