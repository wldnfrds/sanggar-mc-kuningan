<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tambahkan gambar ke pengguna yang sudah ada
        User::all()->each(function ($user) {
            $user->update([
                'img' => 'storage/app/public/mc/n3yJn1ur6Co1ki7RBeIH6Tu9SsB2qMjIcf85GL80.webp',
            ]);
        });

        // Atau tambahkan pengguna baru dengan gambar
        User::create([
            'name' => 'will',
            'email' => 'will@example.com',
            'password' => bcrypt('will'), // Jangan lupa hash password
            'img' => 'storage/app/public/mc/n3yJn1ur6Co1ki7RBeIH6Tu9SsB2qMjIcf85GL80.webp', // Path ke gambar
        ]);
    }
}
