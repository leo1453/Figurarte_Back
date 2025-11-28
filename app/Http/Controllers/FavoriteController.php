<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user_id;

        if (!$userId) {
            return response()->json(['error' => 'Falta user_id'], 400);
        }

        return Favorite::with('product')
            ->where('user_id', $userId)
            ->get();
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $userId = $request->user_id;
        $productId = $request->product_id;

        // ¿Ya existe?
        $existing = Favorite::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['message' => 'Eliminado de favoritos']);
        }

        // Crear favorito
        Favorite::create([
            'user_id' => $userId,
            'product_id' => $productId
        ]);

        return response()->json(['message' => 'Agregado a favoritos']);
    }
}
