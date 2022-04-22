<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Felipe Almonacid',
            'rut' => '194134770',
            'role' => 'Administrador',
            'password' => bcrypt('123456789'),
        ]);
    }
}
