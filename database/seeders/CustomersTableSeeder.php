<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customers;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customers::create([
            'name' => 'Winda',
            'email' => 'wnd@gmail.com',
            'password' => bcrypt('password'), // Pastikan untuk mengenkripsi password
            'phone' => '1234567890',
            'address1' => '123 Street',
            'address2' => 'Apt 101',
            'address3' => 'City'
        ]);

        // Tambahkan data lainnya sesuai kebutuhan
    }
}