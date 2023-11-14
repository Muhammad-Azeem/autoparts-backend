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
            $table->text('images');
            $table->text('description');
            $table->bigInteger('sub_category_id')->unsigned();
            $table->foreign('sub_category_id')
                ->references('id')->on('sub_categories')->onDelete('cascade');
            $table->bigInteger('vehicle_id')->unsigned();
            $table->foreign('vehicle_id')
                ->references('id')->on('vehicles')->onDelete('cascade');
            $table->float('discounted_price');
            $table->text('vehicle_fitment');
            $table->string('sku')->unique();
            $table->text('check_fitment');
            $table->string('other_name');
            $table->string('part_number');
            $table->string('replaced_by');
            $table->string('status');
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
