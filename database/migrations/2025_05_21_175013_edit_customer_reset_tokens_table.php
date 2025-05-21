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
        Schema::table('customer_reset_tokens', function (Blueprint $table) {
            $table->dropPrimary('PRIMARY');
        });

        Schema::table('customer_reset_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 100)->unique()->change();
            $table->string('name', 100)->nullable();
            $table->string('password', 200)->nullable();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_reset_tokens', function (Blueprint $table) {
            $table->dropPrimary('PRIMARY');
            $table->dropColumn('id');
            $table->primary('email');
            $table->dropColumn('name');
            $table->dropColumn('password');
            $table->dropColumn('abilities');
            $table->dropColumn('last_used_at');
            $table->dropColumn('expires_at');
        });
    }
};
