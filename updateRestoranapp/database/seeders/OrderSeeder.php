<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            ['customer_id' => 1, 'menu_id' => 1, 'quantity' => 2, 'status' => 'sedang disiapkan', 'order_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 1, 'menu_id' => 3, 'quantity' => 1, 'status' => 'siap diantar', 'order_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 2, 'menu_id' => 2, 'quantity' => 1, 'status' => 'selesai', 'order_date' => now()->subHours(1), 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 3, 'menu_id' => 4, 'quantity' => 3, 'status' => 'sedang disiapkan', 'order_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 3, 'menu_id' => 5, 'quantity' => 1, 'status' => 'siap diantar', 'order_date' => now()->subMinutes(30), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
