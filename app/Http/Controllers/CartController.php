<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
     public function add(Request $request)
    {
        $request->validate([
        'product_id' => 'required|exists:products,id',
        ]);

        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::id()],
            ['status'  => 'active']
        );

        $item = CartItem::firstOrNew([
            'cart_id'    => $cart->id,
            'product_id' => $request->product_id,
        ]);
        $item->quantity = ($item->quantity ?? 0) + 1;
        $item->save();

        // Compute new count
        $count = $cart->items()->sum('quantity');

        // always JSON
        return response()->json(['count' => $count]);
    }
}
