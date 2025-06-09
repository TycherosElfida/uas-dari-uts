<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@bookrent.com',
            'password' => Hash::make('password'), // Use a strong password in a real project!
            'role' => 'admin',
            'status' => 'Aktif',
        ]);

        User::create([
            'name' => 'test',
            'email' => 'test@mail.com',
            // The password from your old site was 'admin12345'
            'password' => Hash::make('admin12345'),
            'role' => 'member',
            'status' => 'Aktif',
        ]);
    }
}
