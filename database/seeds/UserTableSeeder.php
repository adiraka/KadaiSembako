<?php

use Illuminate\Database\Seeder;
use Sembako\Role;
use Sembako\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	$adminRole = Role::where('nama', 'Admin')->first();
        	$pelangganRole = Role::where('nama', 'Pelanggan')->first();

        	$user = User::create(array(
        		'email' => 'admin@kadai-sembako.id',
        		'password' => bcrypt('admin@admin'),
        		'nama' => 'Adi Raka Siwi',
        		'tmp_lahir' => 'Padang',
        		'tgl_lahir' => '1994-04-29',
        		'jekel' => 'Pria',
        		'alamat' => 'Komp. Filano Mandiri BLOK A1/1 Tabing',
        		'telepon' => '081268280648',
        		'status' => '1',
        	));

        	$user->assignRole($adminRole);

        	$pelanggan = User::create(array(
        		'email' => 'pelanggan@kadai-sembako.id',
        		'password' => bcrypt('pelanggan@pelanggan'),
        		'nama' => 'Rendra Syafputra',
        		'tmp_lahir' => 'Padang',
        		'tgl_lahir' => '1994-04-29',
        		'jekel' => 'Pria',
        		'alamat' => 'Balai Baru',
        		'telepon' => '081268280648',
        		'status' => '1',
        	));

        	$pelanggan->assignRole($pelangganRole);
    }
}
