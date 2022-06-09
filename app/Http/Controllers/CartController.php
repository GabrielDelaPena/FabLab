<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function store(Request $request)
    {
        // find the product
        $product = Product::findOrFail($request->input('product_id'));

        Cart::add(
            $product->id,
            $product->name,
            $request->input('quantity'),
            $product->price,
        );

        return redirect()->route('producten.index');
    }
}
