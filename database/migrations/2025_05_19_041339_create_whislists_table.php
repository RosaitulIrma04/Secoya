<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id(); // ID utama
            $table->foreignId('user_id')   // Foreign key untuk user
                  ->constrained('users')  // Pastikan mengarah ke tabel 'users'
                  ->onDelete('cascade');  // Hapus wishlist jika user dihapus
            $table->foreignId('product_id') // Foreign key untuk produk
                  ->constrained('products')  // Pastikan mengarah ke tabel 'products'
                  ->onDelete('cascade'); // Hapus wishlist jika produk dihapus
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
