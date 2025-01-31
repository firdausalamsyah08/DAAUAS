<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Nike Air Max', 'price' => 1500000, 'category_id' => 1],
            ['name' => 'Adidas Jogger', 'price' => 1200000, 'category_id' => 1],
            ['name' => 'Levi’s Jeans', 'price' => 500000, 'category_id' => 2],
            ['name' => 'Zara Shirt', 'price' => 300000, 'category_id' => 3],
        ]);
    }
}
