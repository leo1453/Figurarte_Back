<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return CartItem::with('product')
            ->where('user_id', 1)
            ->get();
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        $product = Product::find($request->product_id);

        return CartItem::create([
            'user_id' => 1,
            'product_id' => $product->id,
            'cantidad' => $request->cantidad,
            'nombre_producto' => $product->nombre,
            'precio_unitario' => $product->precio,
            'imagen' => $product->imagen
        ]);
    }

    public function remove($id)
    {
        CartItem::where('id', $id)
                ->where('user_id', 1)
                ->delete();

        return ['message' => 'Eliminado del carrito'];
    }

    public function clear()
    {
        CartItem::where('user_id', 1)->delete();
        return ['message' => 'Carrito limpiado'];
    }
}
