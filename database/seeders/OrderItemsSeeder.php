<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;

class OrderItemsSeeder extends Seeder
{
    public function run(): void
    {
        $order = Order::find(1);
        $product = Product::find(1);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'cantidad' => 2,
            'precio_unitario' => $product->precio,
            'nombre_producto' => $product->nombre,
            'imagen' => $product->imagen
        ]);
    }
}
