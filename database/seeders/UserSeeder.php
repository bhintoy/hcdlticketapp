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
            'rut' => '19.413.477-0',
            'department_id' => $department->id,
            'password' => bcrypt('1234'),
        ]);
    }
}
