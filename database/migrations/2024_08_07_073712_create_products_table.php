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

            $table->foreignId('category_id_fk')->constrained()->onDelete('cascade');
            $table->foreignId('subcat_id_fk')->constrained()->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('sku')->nullable();
            $table->string('buying_price')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('brand')->nullable();
            $table->string('tax')->nullable();
            $table->string('status')->nullable();
            $table->string('purchasable')->nullable();
            $table->string('stock_out')->nullable();
            $table->string('refundable')->nullable();
            $table->string('max_quantity')->nullable();
            $table->string('min_quantity')->nullable();
            $table->string('unit')->nullable();
            $table->string('weight')->nullable();
            $table->string('description')->nullable();
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
