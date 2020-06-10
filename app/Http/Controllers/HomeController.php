<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  if(Auth::check())
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
   

    $first = 'hero_first';
    $fi=setting::get($first);
    
    $second = 'hero_second';
    $se=setting::get($second);

    $pic = 'ad_pic';
    $ad=setting::get($pic);
    
    return view('/site.pages.main')->with(compact('fi','se','products','ad'));
    }
}
