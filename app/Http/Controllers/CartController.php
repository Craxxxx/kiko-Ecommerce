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
            ['user_id' => Auth::id()]
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

     /**
     * Display the shopping cart.
     */
    public function show()
    {
        // Get or create active cart
        $cart = Cart::with('items.product')
                     ->firstOrCreate(['user_id'=>Auth::id()]);

        // Pass cart & items to view
        return view('cart', [
            'cartItems' => $cart->items,
            'shipping'  => 10.00,
        ]);
    }

    public function paymentPage()
    {
        $cart = Auth::user()->cart()->with('items.product')->firstOrFail();

        $cartItems = $cart->items;
        $cartSubtotal = $cartItems->sum(fn($item) => $item->quantity * $item->product->price);
        $shipping = 15000;
        $total = $cartSubtotal + $shipping;

        return view('payment', compact('cartItems', 'cartSubtotal', 'shipping', 'total'));
    }
}
