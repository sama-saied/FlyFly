<?php

namespace App\Http\Controllers\Site;

use  App\Models\Cartt;
use Illuminate\Support\Facades\Auth;
use App\Contracts\CartContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    protected $CartRepository;


    public function delete($id,$ud)
    {
    
        $cart = Cartt::where('id',$id);

        $cart->delete();

        $carts = Cartt::all();
        $bool = Cartt::isEmpty($ud);
        return view('site.pages.CartDisplay', compact('carts','bool'));
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
return view('site.pages.CartDisplay', compact('carts','bool'));
}

public function getContent($id)
    {
       $carts = Cartt::all();
       $bool = Cartt::isEmpty($id);
       return view('site.pages.CartDisplay', compact('carts','bool'));
    }

}