<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            ['name' => 'Andi', 'table_number' => 1, 'contact' => '081234567890', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Budi', 'table_number' => 2, 'contact' => '081234567891', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Citra', 'table_number' => 3, 'contact' => '081234567892', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

