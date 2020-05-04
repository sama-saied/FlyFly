<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartt;
use App\Models\Product;
//use App\Models\User;

use Illuminate\Support\Facades\Auth;

class CarttController extends Controller
{
    public function store(Request $request , $product_id )
    {
        $cart=new Cartt;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $product_id;
       //$cart->first_name = $request->first_name;
       $cart->first_name =Auth::user()->first_name;
      // $cart->last_name = $request->last_name;
       $cart->last_name =Auth::user()->last_name;
     
       // $cart->product_name = $request->product_name;
       // $cart->product_price = $request->product_price;
      
      // $cart->product_sale_price = $request->product_sale_price;
       
      // $cart->quantity= $request->quantity;
      
        $cart->save();
      
        return redirect()->back();


    }


    public function getCart()
    {
        
        return view('site.pages.CartDisplay');
    }
}
