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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');
            $table->string('country');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company')->nullable();
            $table->string('city');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('save_as')->nullable();
            $table->boolean('is_default');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};