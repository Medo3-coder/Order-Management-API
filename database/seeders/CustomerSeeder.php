<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        Customer::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
        ]);
    }
}
