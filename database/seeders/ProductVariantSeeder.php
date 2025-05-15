<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductVariant::insert([
            [
                'product_id' => 1,
                'volume_ml' => 500,
                'price_per_ml' => 24,
                'price_total' => 12000,
                'production_date' => now()->subDays(5),
                'stock_quantity' => 100
            ],
            [
                'product_id' => 1,
                'volume_ml' => 1000,
                'price_per_ml' => 23,
                'price_total' => 23000,
                'production_date' => now()->subDays(2),
                'stock_quantity' => 50
            ],
            [
                'product_id' => 2,
                'volume_ml' => 330,
                'price_per_ml' => 30.3,
                'price_total' => 10000,
                'production_date' => now()->subDays(3),
                'stock_quantity' => 80
            ],
        ]);
    }
}
