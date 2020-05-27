<?php

namespace App\Http\Controllers\Site;

use  App\Models\Cartt;
use Illuminate\Support\Facades\Auth;
use App\Contracts\CartContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use  App\Models\Product;

class CarttController extends Controller
{

    protected $CartRepository;
    protected $ProductRepository;



    public function delete($id,$ud)
    {
    
        $cart = Cartt::where('id',$id);

        $cart->delete();

        $carts = Cartt::all();
        $bool = Cartt::isEmpty($ud);
        $pro = Product::all();
        $total = Cartt::getTotal($ud);
        return view('site.pages.CartDisplay', compact('carts','bool','pro','total'));
    }

public function ClearCart($id)
{
    $carts = Cartt::all();
    
foreach($carts as $cart)
{
if($cart->user_id == $id)
    $cart->delete();
}
$carts = Cartt::all();
$bool = Cartt::isEmpty($id);
$total = Cartt::getTotal($id);
return view('site.pages.CartDisplay', compact('carts','bool','total'));
}



public function getContent($id)
    {
       $carts = Cartt::all();
       $bool = Cartt::isEmpty($id);
       $pro = Product::all();
       $total = Cartt::getTotal($id);
       return view('site.pages.CartDisplay', compact('carts','bool','pro','total'));
    }

}