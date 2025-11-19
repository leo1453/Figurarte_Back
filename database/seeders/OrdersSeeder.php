<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersSeeder extends Seeder
{
    public function run(): void
    {
        Order::create([
            'user_id' => 2,
            'total' => 4998.00,
            'status' => 'pagado-simulado'
        ]);
    }
}
