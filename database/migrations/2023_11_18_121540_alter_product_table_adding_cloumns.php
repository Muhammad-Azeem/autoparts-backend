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
        Schema::table('products', function (Blueprint $table) {
            $table->string('part-name-code')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('brand')->nullable();
            $table->string('replaces')->nullable();
            $table->string('manufacturer-part-number')->nullable();
            $table->string('part-description')->nullable();
            $table->string('fitment-type')->nullable();
            $table->string('SKU')->nullable();
            $table->string('warranty')->nullable();
            $table->string('part_description-other-name')->nullable();
            $table->string('manufacturer-note')->nullable();
            $table->string('item-dimension')->nullable();
            $table->string('item-weight')->nullable();
            $table->string('position')->nullable();
            $table->string('condition')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('part-name-code');
            $table->dropColumn('manufacturer');
            $table->dropColumn('brand');
            $table->dropColumn('replaces');
            $table->dropColumn('manufacturer-part-number');
            $table->dropColumn('part-description');
            $table->dropColumn('fitment-type');
            $table->dropColumn('SKU');
            $table->dropColumn('warranty');
            $table->dropColumn('part_description-other-name');
            $table->dropColumn('manufacturer-note');
            $table->dropColumn('item-dimension');
            $table->dropColumn('item-weight');
            $table->dropColumn('position');
            $table->dropColumn('condition');
        });
    }
};
