<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function shop()
    {
        return view('frontend.shop');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactMe(Request $request){

        Contact::create($request->all());

        return redirect()->route('contact')->with('success', 'message sent to company');
    }


    public function category($category){

        $products = Product::where('category_id', $category)->paginate(10);
        $categories = Category::all();
        return view('frontend.category', compact('products', 'categories'));
    }
}
