<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class Homee extends Controller
{
  
 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
{

    $products = Product::all();
   

    $first = 'hero_first';
    $fi=setting::get($first);
    
    $second = 'hero_second';
    $se=setting::get($second);

    $pic = 'ad_pic';
    $ad=setting::get($pic);
    
    return view('/site.pages.homepage')->with(compact('fi','se','products','ad'));
}


public function firstproduct()
{
    $key = 'firstpro_link';
    $li=setting::get($key);
    
    return redirect()->away($li);    
}

public function secondproduct()
{
    $key = 'secondpro_link';
    $li=setting::get($key);
    
    return redirect()->away($li);    
}

public function adlink()
{
    $key = 'adv_link';
    $li=setting::get($key);
    
    return redirect()->away($li);     
}

}
