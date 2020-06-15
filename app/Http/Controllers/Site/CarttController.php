<?php

namespace App\Http\Controllers\Site;

use  App\Models\Cartt;
use  App\Models\Cart_storage;
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
        $attr = Cart_storage::where('cart_id',$id);

        $attr->delete();
        $cart->delete();

        $carts = Cartt::all();
        $bool = Cartt::isEmpty($ud);
        $pro = Product::all();
        $total = Cartt::getTotal($ud);
        $attr = Cart_storage::all();
        return view('site.pages.CartDisplay', compact('carts','bool','pro','total','attr'));
    }

public function ClearCart($id)
{
    $carts = Cartt::all();
    $attrs = Cart_storage::all();
    
foreach($carts as $cart)
{

    foreach($attrs as $attr)
    {
        if($attr->cart_id == $cart->id)
          $attr->delete();

    }
    
if($cart->user_id == $id)
    $cart->delete();

    
}
$carts = Cartt::all();
$bool = Cartt::isEmpty($id);
$total = Cartt::getTotal($id);
$attr = Cart_storage::all();
return view('site.pages.CartDisplay', compact('carts','bool','total','attr'));
}



public function getContent($id)
    {
       $carts = Cartt::all();
       $bool = Cartt::isEmpty($id);
       $pro = Product::all();
       $total = Cartt::getTotal($id);
       $attr = Cart_storage::all();
       return view('site.pages.CartDisplay', compact('carts','bool','pro','total','attr'));
    }

}