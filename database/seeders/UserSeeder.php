<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ramon Hidayat',
            'email' => 'hidayatmramon@gmail.com',
            'password' => bcrypt('ramon123'),
            'role' => 'staff',

        ]);

        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'name' => Str::random(8),
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('ramon123'),
                'role' => 'staff',
            ]);
        }
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'name' => Str::random(8),
                'email' => Str::random(10) . '@gmail.com',
                'password' => bcrypt('ramon123'),
                'role' => 'guru',
            ]);
        }
    }
}
