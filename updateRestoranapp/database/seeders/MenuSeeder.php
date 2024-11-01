<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            ['name' => 'Nasi Goreng', 'category' => 'makanan utama', 'price' => 15000, 'available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ayam Penyet', 'category' => 'makanan utama', 'price' => 20000, 'available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Es Teh Manis', 'category' => 'minuman', 'price' => 5000, 'available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kopi Susu', 'category' => 'minuman', 'price' => 10000, 'available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pudding Coklat', 'category' => 'makanan penutup', 'price' => 8000, 'available' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
