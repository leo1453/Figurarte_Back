<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with('items.product')
            ->where('user_id', 1)
            ->get();
    }

    public function checkout()
    {
        $cart = CartItem::where('user_id', 1)->get();

        if ($cart->isEmpty()) {
            return response()->json(['error' => 'El carrito está vacío'], 400);
        }

        $total = $cart->sum(fn($item) => $item->precio_unitario * $item->cantidad);

        $order = Order::create([
            'user_id' => 1,
            'total' => $total,
            'status' => 'pagado-simulado'
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'cantidad' => $item->cantidad,
                'precio_unitario' => $item->precio_unitario,
                'nombre_producto' => $item->nombre_producto,
                'imagen' => $item->imagen
            ]);
        }

        CartItem::where('user_id', 1)->delete();

        return ['message' => 'Compra simulada exitosa', 'order' => $order];
    }
}
