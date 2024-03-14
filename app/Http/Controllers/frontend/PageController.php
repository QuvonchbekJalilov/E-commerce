<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
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
}
