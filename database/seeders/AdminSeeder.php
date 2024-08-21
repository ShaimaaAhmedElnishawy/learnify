<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear all existing data from the admins table
        Admin::truncate();

        // Data to be seeded
        $admins = [
            [
                'name' => 'shaimaa',
                'email' => 'shaimaa@gmail.com',
                'password' => Hash::make('shaimaa1234'), // Hash the password
            ],
            [
                'name' => 'mohammed',
                'email' => 'mohammed@gmail.com',
                'password' => Hash::make('mohammed1234'), // Hash the password
            ],
            [
                'name' => 'jumana',
                'email' => 'jumana@gmail.com',
                'password' => Hash::make('jojoAdmin'), // Hash the password
            ],
            // Add more admins as needed
        ];
        // Insert data
        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
