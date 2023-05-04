<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Request $req, Product $product)
    {
        $user_id = Auth::id();
        $product_id = $product->id;

        $existing_cart = Cart::where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->first();

        if ($existing_cart == null) {
            $req->validate([
                'amount' => 'required|gte:1|lte:' . $product->stock
            ]);

            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'amount' => $req->amount,
            ]);
        } else {
            $req->validate([
                'amount' => 'required|gte:1|lte:' . ($product->stock - $existing_cart->amount)
            ]);

            $existing_cart->update([
                'amount' => $existing_cart->amount + $req->amount
            ]);
        }

        return Redirect::route('cart');
    }

    public function showCart()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();

        return view('cart', compact('carts'));
    }

    public function updateCart(Request $req, Cart $cart)
    {
        $req->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->stock
        ]);

        $cart->update([
            'amount' =>  $req->amount
        ]);

        return Redirect::route('cart');
    }

    public function deleteCart(Cart $cart)
    {
        $cart->delete();

        return Redirect::back();
    }
}
