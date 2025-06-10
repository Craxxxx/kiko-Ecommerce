<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    public function update(Request $request, $id)
    {
        $item = CartItem::with(['cart', 'product'])->findOrFail($id);

        if ($item->cart->user_id !== Auth::id()) abort(403);

        $change = (int) $request->change;
        $item->quantity += $change;

        if ($item->quantity < 1) {
            $item->delete();
            $removed = true;
        } else {
            $item->save();
            $removed = false;
        }

        // 🧠 Always re-fetch the cart fresh after mutation
        $cart = $item->cart()->with('items.product')->first();

        $itemSubtotal = $removed ? 0 : $item->quantity * $item->product->price;
        $cartSubtotal = $cart->items->sum(fn($i) => $i->quantity * $i->product->price);
        $shipping     = 10.00;
        $cartTotal    = $cartSubtotal + $shipping;
        $itemCount    = $cart->items->sum('quantity');

        return response()->json([
            'removed'       => $removed,
            'quantity'      => $item->quantity,
            'itemSubtotal'  => number_format($itemSubtotal, 2),
            'cartSubtotal'  => number_format($cartSubtotal, 2),
            'cartTotal'     => number_format($cartTotal, 2),
            'cartItemCount' => $itemCount,
        ]);
    }

    public function destroy($id)
    {
        $item = CartItem::with(['cart'])->findOrFail($id);

        if ($item->cart->user_id !== Auth::id()) abort(403);

        $item->delete();

        // ✅ Refresh the cart after deletion
        $cart = $item->cart()->with('items.product')->first();

        $cartSubtotal = $cart->items->sum(fn($i) => $i->quantity * $i->product->price);
        $shipping     = 10.00;
        $cartTotal    = $cartSubtotal + $shipping;
        $itemCount    = $cart->items->sum('quantity');

        return response()->json([
            'removed'       => true,
            'cartSubtotal'  => number_format($cartSubtotal, 2),
            'cartTotal'     => number_format($cartTotal, 2),
            'cartItemCount' => $itemCount,
        ]);
    }
}
