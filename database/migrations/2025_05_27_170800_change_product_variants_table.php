<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropColumn(['volume_ml', 'price_per_ml', 'price_total']);

            $table->date('production_date')->nullable()->change();
            $table->integer('stock_quantity')->nullable()->change();

            $table->string('variant_color')->nullable();
            $table->decimal('variant_price', 10, 2)->nullable();
            $table->date('expiration_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->integer('volume_ml');
            $table->decimal('price_per_ml', 10, 2)->nullable();
            $table->decimal('price_total', 10, 2);

            $table->date('production_date')->nullable(false)->change();
            $table->integer('stock_quantity')->nullable(false)->change();

            $table->dropColumn(['variant_color', 'variant_price', 'expiration_date']);
        });
    }
};
