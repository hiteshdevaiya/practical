<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart');

        if (!$cart) {
            return redirect()->back()->with('error', 'Cart is empty!');
        }

        $order = new Order();
        $order->user_id = auth()->id();
        $order->save();

        foreach ($cart as $productId => $cartItem) {
            $product = Product::find($productId);
            $order->products()->attach($product, ['quantity' => $cartItem['quantity']]);
            $product->stock -= $cartItem['quantity'];
            $product->save();
        }

        session()->forget('cart');

        Session::flash('success', 'Order placed successfully!');

        return redirect()->route('index');
    }
}
