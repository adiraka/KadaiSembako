<?php

namespace Sembako;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'satuans';

    protected $fillable = [
    	'id', 'nm_satuan', 'created_at', 'updated_at'
    ];

    public function barang()
    {
    	return $this->hasMany('Sembako\Barang', 'barang_id', 'id');
    }
}
