<?php

namespace Sembako;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';

    protected $fillable = [
    	'id', 'kategori_id', 'satuan_id', 'nm_barang', 'harga', 'qty', 'keterangan', 'created_at', 'updated_at'
    ];

    public function kategori()
    {
    	return $this->belongsTo('Sembako\Kategori', 'kategori_id');
    }

    public function satuan()
    {
    	return $this->belongsTo('Sembako\Satuan', 'satuan_id');
    }

    public function detail()
    {
        return $this->hasMany('Sembako\DetailTransaksi');
    }
}
