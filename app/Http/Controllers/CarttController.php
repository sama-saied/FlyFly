<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartt;
//use App\Models\Product;
//use App\Models\User;

use Illuminate\Support\Facades\Auth;

class CarttController extends Controller
{
    
    public function store(Request $request , $product_id)
    {
        $cart=new Cartt;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $product_id;
        $cart->save();
        return redirect()->back();
    }

    public function getCart()
    {
        return view('site.pages.CartDisplay');
    }

   
}
