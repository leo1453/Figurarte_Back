<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use App\Models\User;
use App\Mail\OrderReceiptMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;



class OrderController extends Controller
{
 public function index(Request $request)
{
    $userId = $request->user_id;

    return Order::with('items.product')
        ->where('user_id', $userId)
        ->get();
}


public function checkout(Request $request)
{
    $userId = $request->user_id; // viene del front

    if (!$userId) {
        return response()->json(['error' => 'Falta user_id'], 400);
    }

    $cart = CartItem::where('user_id', $userId)->get();
    if ($cart->isEmpty()) {
        return response()->json(['error' => 'El carrito está vacío'], 400);
    }

    // Calcular total
    $total = $cart->sum(fn($item) => $item->precio_unitario * $item->cantidad);

    // Crear orden
    $order = Order::create([
        'user_id' => $userId,
        'total'   => $total,
        'status'  => 'pagado-simulado'
    ]);

    // Guardar productos
    foreach ($cart as $item) {
        OrderItem::create([
            'order_id'        => $order->id,
            'product_id'      => $item->product_id,
            'cantidad'        => $item->cantidad,
            'precio_unitario' => $item->precio_unitario,
            'nombre_producto' => $item->nombre_producto,
            'imagen'          => $item->imagen,
        ]);
    }

    // Cargar items para mandarlos al front
    $order->load('items');
// 📨 Enviar correo al usuario
$user = User::find($userId);

Mail::to($user->email)->send(new OrderReceiptMail($user, $order));

    // Vaciar carrito
    CartItem::where('user_id', $userId)->delete();

    return response()->json([
        'message' => 'Compra exitosa',
        'order'   => $order
    ]);
}



public function show($id)
{
    $order = Order::with('items.product')->find($id);

    if (!$order) {
        return response()->json(['error' => 'Orden no encontrada'], 404);
    }

    return response()->json($order);
}




}
