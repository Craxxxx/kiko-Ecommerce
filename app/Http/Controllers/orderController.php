<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class orderController extends Controller
{
    public function processCheckout(Request $request)
{
    // Validate form input
    $request->validate([
        'email'     => 'required|string',
        'fullname'  => 'required|string',
        'address'   => 'required|string',
    ]);

    $cart = Cart::with('items.product')->where('user_id', Auth::id())->first();

    if (!$cart || $cart->items->isEmpty()) {
        return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
    }

    $cartItems = $cart->items;
    $cartSubtotal = $cartItems->sum(fn($item) => $item->quantity * $item->product->price);
    $shipping = 15000;
    $total = $cartSubtotal + $shipping;

    // Save order logic would go here (for now, we'll skip DB persistence)

    // Store data in session for order-success page
    session([
        'orderData' => [
            'order_number' => 'KP-' . mt_rand(100000, 999999),
            'email'        => $request->email,
            'fullname'     => $request->fullname,
            'address'      => $request->address,
            'cartItems'    => $cartItems->map(function ($item) {
                return [
                    'name'     => $item->product->name,
                    'price'    => $item->product->price,
                    'quantity' => $item->quantity,
                    'image'    => $item->product->image_url,
                ];
            }),
            'subtotal' => $cartSubtotal,
            'shipping' => $shipping,
            'total'    => $total,
            'payment_method' => 'Transfer Virtual Account',
        ]
    ]);

    // ✅ Clear the cart AFTER saving the order data
    $cart->items()->delete();

    return redirect()->route('checkout.success');
}


}
