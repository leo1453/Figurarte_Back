<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use App\Models\User;
use App\Mail\OrderReceiptMail;
use Illuminate\Support\Facades\Mail;

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

        $user = auth()->user() ?? User::find(1);

        // Ensure order has items loaded for the email view
        $order->load('items');

        try {
            if ($user && $user->email) {
                Mail::to($user->email)->send(new OrderReceiptMail($user, $order));
            }
        } catch (\Exception $e) {
            \Log::error('Error enviando correo de recibo: ' . $e->getMessage());
        }

        
        CartItem::where('user_id', 1)->delete();

        return [
            'message' => 'Compra simulada exitosa',
            'order' => $order
        ];
    }

}
