<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID pesanan
            $table->integer('customer_id'); // Relasi ke tabel customers
            $table->integer('menu_id'); // Relasi ke tabel menus
            $table->integer('quantity')->nullable(false); // Jumlah pesanan
            $table->enum('status', ['sedang disiapkan', 'siap diantar', 'selesai'])->default('sedang disiapkan'); // Status pesanan
            $table->timestamp('order_date')->default(now()); // Tanggal pesanan
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
