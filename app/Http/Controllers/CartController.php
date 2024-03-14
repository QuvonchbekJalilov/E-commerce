<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);

        $cart = Cart::add([
            'id' => $product->id,
            'name' => $product->name,

            'qty' => 1, // Ensure 'quantity' key is set to 1
            'price' => $product->price,
            'attributes' => [
                'image' => $product->photos->isNotEmpty() ? $product->photos->first()->path : null,
            ]
        ]);

        return redirect()->route('shop')->with('success', 'Cart added successfully');
    }

    public function viewCart()
    {

        $cartContent = Cart::content();
        $total  = Cart::total();
        return view('frontend.cart', compact('cartContent', 'total'));
    }

    public function updateCartItem(Request $request)
    {
        $rowId = $request->input('rowId');
        $action = $request->input('action');

        $item = Cart::get($rowId);

        if ($action === 'increment') {
            Cart::update($rowId, $item->qty + 1);
        } elseif ($action === 'decrement' && $item->qty > 1) {
            Cart::update($rowId, $item->qty - 1);
        }

        return redirect()->route('viewCart')->with('success', 'Item quantity updated');
    }

    public function deleteCartItem(Request $request)
    {
        $rowId = $request->input('rowId');
        // Remove the item from the cart
        Cart::remove($rowId);

        // Redirect back to the cart page or any other desired page
        return redirect()->route('viewCart')->with('success', 'Item removed from cart');
    }
}
