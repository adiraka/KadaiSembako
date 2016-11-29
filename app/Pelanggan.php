<?php

namespace Sembako;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelanggan extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'password', 'nama', 'tmp_lahir', 'tgl_lahir', 'jekel', 'alamat', 'telepon'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
