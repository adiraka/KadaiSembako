<?php

namespace Sembako;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksis';

    protected $fillable = [
    	'id', 'transaksi_id', 'barang_id', 'qty', 'harga', 'subtotal', 'created_at', 'updated_at'
    ];

    public function transaksi()
    {
    	return $this->belongsTo('Sembako\Transaksi');
    }

    public function barang()
    {
    	return $this->belongsTo('Sembako\Barang');
    }
}
