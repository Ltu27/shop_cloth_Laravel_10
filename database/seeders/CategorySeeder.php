<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('categories')->insert([
            [
                'name' => 'Trang điểm',
                'status' => 1,
            ],
            [
                'name' => 'Chăm sóc cơ thể',
                'status' => 1,
            ],
            [
                'name' => 'Dưỡng da',
                'status' => 1,
            ],
        ]);
    }
}
