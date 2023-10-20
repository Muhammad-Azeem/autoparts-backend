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
            $table->string('name');
            $table->float('price');
            $table->text('description');
            $table->bigInteger('sub_category_id');
            $table->bigInteger('vehicle_id');
            $table->float('discounted_price');
            $table->text('vehicle_fitment');
            $table->text('check_fitment');
            $table->string('other_name');
            $table->string('part_number');
            $table->string('replaced_by');
            $table->bigInteger('status');
            $table->bigInteger('available_stock');
            $table->float('wholesale_price');
            $table->bigInteger('minimum_quantity');
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
