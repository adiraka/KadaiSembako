<?php

namespace Sembako;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksis";

    protected $fillable = [
    	'id', 'user_id', 'tgl', 'metode', 'total_bayar', 'status', 'created_at', 'updated_at'
    ];

    public function detail()
    {
    	return $this->hasMany('Sembako\DetailTransaksi');
    }

    public function user()
    {
    	return $this->belongsTo('Sembako\User');
    }
}
