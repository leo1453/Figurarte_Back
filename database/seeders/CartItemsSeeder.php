<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CartItem;
use App\Models\Product;

class CartItemsSeeder extends Seeder
{
    public function run(): void
    {
        $p = Product::find(1);

        CartItem::create([
            'user_id' => 2,
            'product_id' => $p->id,
            'cantidad' => 2,
            'nombre_producto' => $p->nombre,
            'precio_unitario' => $p->precio,
            'imagen' => $p->imagen
        ]);
    }
}
