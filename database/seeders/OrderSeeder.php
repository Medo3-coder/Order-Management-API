<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::create([
            'customer_id' => 1, // Refers to John Doe
            'product_name' => 'Laptop',
            'quantity' => 2,
            'price' => 1500.50,
            'status' => 'pending',
        ]);

        Order::create([
            'customer_id' => 2, // Refers to Jane Smith
            'product_name' => 'Phone',
            'quantity' => 1,
            'price' => 799.99,
            'status' => 'shipped',
        ]);

        Order::create([
            'customer_id' => 1,
            'product_name' => 'Tablet',
            'quantity' => 3,
            'price' => 499.99,
            'status' => 'pending',
        ]);
    }
}
