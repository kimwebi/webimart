<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::updateOrCreate([
            'name' => 'JBL Earbuds',
            'price' => 129.45,
            'stock_quantity' => 20,
            'image' => 'assets/images/products/earpods.jpg',
        ]);

        Product::updateOrCreate([
            'name' => 'Iphone X',
            'price' => 399.00,
            'stock_quantity' => 15,
            'image' => 'assets/images/products/iphone.jpg',
        ]);

        Product::updateOrCreate([
            'name' => 'Grays Hockey Stick',
            'price' => 249.10,
            'stock_quantity' => 30,
            'image' => 'assets/images/products/grays.jpg',
        ]);

        Product::updateOrCreate([
            'name' => 'Grays Backpack',
            'price' => 129.99,
            'stock_quantity' => 8,
            'image' => 'assets/images/products/bag.jpg',
        ]);

        Product::updateOrCreate([
            'name' => 'Adidas Shin Guards',
            'price' => 39.25,
            'stock_quantity' => 4,
            'image' => 'assets/images/products/adidas.jpg',
        ]);
    }
}
