<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        $quantity = $request->input('quantity', 1);

        // If product is already in cart, update quantity for this perticular product otherwise add into cart
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'brand' => $product->brand->name,
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "stock" => $product->stock
            ];
        }

        session()->put('cart', $cart);

        Session::flash('success', 'Cart added successfully!');

        return redirect()->route('cart');
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = $request->quantity;
        }

        session()->put('cart', $cart);
        Session::flash('success', 'Cart Update successfully!');

        return Response::json(['success' => true]);
    }

    public function removeFromCart(Product $product)
    {
        $cart = session()->get('cart');

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }

        Session::flash('success', 'Cart removed successfully!');

        return redirect()->back();
    }

    public function viewCart()
    {
        return view('cart', ['cart' => session()->get('cart', [])]);
    }
}
