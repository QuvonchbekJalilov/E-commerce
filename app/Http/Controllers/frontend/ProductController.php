<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(20);
        $categories = Category::all();
        
        return view('frontend.products.index', compact('products', 'categories'));
    }

    public function show($product){
        $product = Product::find($product);

        return view('frontend.products.show', compact('product'));
    }
}
