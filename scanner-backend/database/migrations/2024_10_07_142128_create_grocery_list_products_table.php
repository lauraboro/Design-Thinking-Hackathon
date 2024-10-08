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
        Schema::create('grocery_list_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grocery_list_id')->constrained('grocery_list');
            $table->string('product_name');
            $table->string('product_barcode');
            $table->integer('product_quantity')->default(1);
            $table->string('product_image')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grocery_list_products');
    }
};
