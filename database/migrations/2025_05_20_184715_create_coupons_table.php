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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); 
            $table->enum('type', ['percentage', 'fixed'])->default('fixed'); 
            $table->decimal('value', 10, 2)->nullable(); 
            $table->decimal('min_order_amount', 10, 2)->nullable(); 
            $table->integer('usage_limit')->nullable(); 
            $table->integer('used')->default(0); 
            $table->date('expires_at')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
