<?php

namespace Sembako;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';

    protected $fillable = [
    	'id', 'nm_kategori', 'created_at', 'updated_at'
    ];

    public function barang()
    {
    	return $this->hasMany('Sembako\Barang', 'kategori_id', 'id');
    }
}
