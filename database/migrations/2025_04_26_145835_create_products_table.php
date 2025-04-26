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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->string('description', 150);
            // $table->string('img_url', 150);
        
            // Uncomment these if needed for foreign key relationships
            // $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            // $table->foreignId('category_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
