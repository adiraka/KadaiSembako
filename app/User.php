<?php

namespace Sembako;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'id', 'email', 'password', 'nama', 'tmp_lahir', 'tgl_lahir', 'jekel', 'alamat', 'telepon'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function transaksi()
    {
        return $this->hasMany('Sembako\Transaksi');
    }

    public function roles()
    {
        return $this->belongsToMany('Sembako\Role')->withTimeStamps();
    }

    public function hasRole($name)
    {
        foreach($this->roles as $role)
        {
            if($role->nama == $name) return true;
        }

        return false;
    }

    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

    public function getStatus()
    {
        return $this->status;
    }

}
