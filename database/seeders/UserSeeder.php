<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Department;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = Department::first();

        User::create([
            'name' => 'Felipe Almonacid',
            'rut' => '194134770',
            'department_id' => $department->id,
            'password' => bcrypt('123456789'),
        ]);
    }
}
