<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
    {
        //add to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array('date' => date('d-m-Y')),
            'associatedModel' => $product
        ));
        return redirect()->route('cart.index');
    }

    public function update()
    {
    }

    public function index()
    {
        $cartItems = \Cart::session(auth()->id())->getContent();
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->price;
        };
        $data = [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice
        ];
        return view('cart.index', $data);
    }

    public function destroy($itemId)
    {
        $cartItems = \Cart::session(auth()->id())->remove($itemId);
        return back();
    }
}
