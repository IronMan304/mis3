<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Create admin user
          User::create([
            'first_name' => 'John',
            'middle_name' => 'Admin',
            'last_name' => 'Doe',
            //'position' => 'admin',
            //'position_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ])->assignRole('admin');

        // Create staff user
        User::create([
            'first_name' => 'Jane',
            'middle_name' => 'Staff',
            'last_name' => 'Doe',
            //'position' => 'staff',
            //'position_id' => 2,
            'email' => 'staff@gmail.com',
            'password' => bcrypt('staff123')
        ])->assignRole('staff');
    }
}
