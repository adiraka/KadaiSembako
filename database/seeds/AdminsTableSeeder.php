<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        	'email' => 'admin@kadai-sembako.id',
        	'password' => bcrypt('admin@admin'),
        	'nama' => 'Adi Raka Siwi',
        	'tmp_lahir' => 'Padang',
        	'tgl_lahir' => '1994-04-29',
        	'jekel' => 'Pria',
        	'alamat' => 'Komp. Filano Mandiri BLOK A1/1 Tabing',
        	'telepon' => '081268280648',
            'status' => '1',
        ]);
    }
}
