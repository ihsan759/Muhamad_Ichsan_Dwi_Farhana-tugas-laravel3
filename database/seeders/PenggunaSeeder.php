<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengguna::query()->create([
            "nama" => "Fulan",
            "email" => "fulan@gmail.com",
            "password" => "fulan123"
        ]);
    }
}
