<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            ['category_id' => 1, 'name' => 'Phấn dặm', 'image' => null],
            ['category_id' => 2, 'name' => 'Sữa tắm cừu', 'image' => null],
            ['category_id' => 3, 'name' => 'Kem dưỡng ẩm', 'image' => null],
        ]);
    }
}
