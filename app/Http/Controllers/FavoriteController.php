<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        return Favorite::with('product')
            ->where('user_id', 1)
            ->get();
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $fav = Favorite::where('user_id', 1)
                       ->where('product_id', $request->product_id)
                       ->first();

        if ($fav) {
            $fav->delete();
            return ['message' => 'Eliminado de favoritos'];
        }

        Favorite::create([
            'user_id' => 1,
            'product_id' => $request->product_id
        ]);

        return ['message' => 'Agregado a favoritos'];
    }
}
