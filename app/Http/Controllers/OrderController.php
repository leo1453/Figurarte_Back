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

        $userId = auth()->id();

        if (!$userId) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }

        $cart = CartItem::where('user_id', $userId)->get();

        if ($cart->isEmpty()) {
            return response()->json(['error' => 'El carrito está vacío'], 400);
        }

     
        $total = $cart->sum(fn($item) => $item->precio_unitario * $item->cantidad);

     
        $order = Order::create([
            'user_id' => $userId,
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

    
        $user = User::find($userId);


        $order->load('items');


        try {
            Mail::to($user->email)->send(new OrderReceiptMail($user, $order));
        } catch (\Exception $e) {
            \Log::error("Error enviando correo: " . $e->getMessage());
        }

        CartItem::where('user_id', $userId)->delete();

        return [
            'message' => 'Compra exitosa',
            'order'   => $order
        ];
    }


}
