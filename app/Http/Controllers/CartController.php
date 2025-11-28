<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user_id ?? null;

        if (!$userId) {
            return response()->json(['error' => 'Falta user_id'], 400);
        }

        return CartItem::with('product')
            ->where('user_id', $userId)
            ->get();
    }

    public function add(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|integer',
            'product_id' => 'required|exists:products,id',
            'cantidad'   => 'required|integer|min:1'
        ]);

        $product = Product::find($request->product_id);

        return CartItem::create([
            'user_id'        => $request->user_id,
            'product_id'     => $product->id,
            'cantidad'       => $request->cantidad,
            'nombre_producto'=> $product->nombre,
            'precio_unitario'=> $product->precio,
            'imagen'         => $product->imagen
        ]);
    }

    public function remove(Request $request, $id)
    {
        $userId = $request->user_id;

        CartItem::where('id', $id)
                ->where('user_id', $userId)
                ->delete();

        return ['message' => 'Eliminado del carrito'];
    }

    public function clear(Request $request)
    {
        $userId = $request->user_id;

        CartItem::where('user_id', $userId)->delete();
        return ['message' => 'Carrito limpiado'];
    }

    public function getUserCart($user_id)
    {
        return CartItem::where('user_id', $user_id)->get();
    }
}
