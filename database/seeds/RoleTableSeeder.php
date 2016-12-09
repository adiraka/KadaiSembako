<?php

use Illuminate\Database\Seeder;
use Sembako\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'nama' => 'Admin'
        ]);

        Role::create([
        	'nama' => 'Pelanggan'
        ]);
    }
}
