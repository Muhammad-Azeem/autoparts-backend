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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('type',['1','2']);
            $table->string('job_title')->nullable();
            $table->string('business_type')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_phone_number')->nullable();
            $table->string('business_address1')->nullable();
            $table->string('business_address2')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
