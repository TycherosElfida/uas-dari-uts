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
        // ini buat role admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@bookrent.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
            'status' => 'Aktif',
        ]);

        // Ini buat role member
        User::create([
            'name' => 'test',
            'email' => 'test@mail.com',
            'password' => Hash::make('12345'),
            'role' => 'member',
            'status' => 'Aktif',
        ]);
    }
}
