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
        Schema::create('menus', function (Blueprint $table) {
            $table->id(); // ID menu
            $table->string('name', 100); // Nama hidangan
            $table->enum('category', ['makanan utama', 'minuman', 'makanan penutup']); // Kategori
            $table->decimal('price', 10, 2); // Harga
            $table->boolean('available')->default(true); // Ketersediaan
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
