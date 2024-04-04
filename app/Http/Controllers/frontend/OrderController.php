<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function makeOrder(Request $request)
    {
        if (!auth()->user()){
            return view('frontend.auth.login');
        }
        $validatedData = $request->validate([
            
            'phone_number' => 'required|string',
            'product_ids' => 'required|array',
            'quantities' => 'required|array',
            'product_ids.*' => 'exists:products,id',
            'quantities.*' => 'integer|min:1',
        ]);

        foreach ($validatedData['product_ids'] as $key => $product_id) {
            // Find the product
            $product = Product::findOrFail($product_id);
    
            // Calculate total amount based on product price and quantity
            $total_amount = $product->price * $validatedData['quantities'][$key];
    
            // Create the order record
            $order = Order::create([
                'user_id' => auth()->user()->id ?? null, // Assuming you have user authentication
                'product_id' => $product_id,
                'phone_number' => $validatedData['phone_number'],
                'quantity' => $validatedData['quantities'][$key],
                'total_amount' => $total_amount,
                'status' => 'New Order',
            ]);
    
            // Decrease the product stock
            $product->decrement('stock', $validatedData['quantities'][$key]);
            Session::forget('cart');

        }

        return redirect()->route('shop')->with('success', "Order Created Syccessfully");
    

    }

    public function myOrder(){
        
        $orders = auth()->user()->orders()->paginate(10);

        return view('frontend.myOrder', compact('orders'));
    }
}
