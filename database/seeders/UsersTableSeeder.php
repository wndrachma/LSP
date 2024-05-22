<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Users;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'name' => 'Winda',
            'email' => 'wnd@gmail.com',
            'password' => bcrypt('password'), // Pastikan untuk mengenkripsi password
            'roles' => 'admin',
            'aktif' => 'active'
        ]);

        // Tambahkan data lainnya sesuai kebutuhan
    }
}