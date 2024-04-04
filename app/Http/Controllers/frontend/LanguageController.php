<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function language($locale){
        
        App::setLocale($locale);

        Session::put('locale', $locale);

        return redirect()->back();
    }
}
