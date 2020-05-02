<?php


namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class RatingController extends Controller
{
/**
* Create a new controller instance.
*
* @return void
*/

 public function __construct()
  {
   $this->middleware('auth');
  }

/**
* Show the application dashboard.
*
* @return \Illuminate\Http\Response
*/

 public function index()
  {
   return view('home');
  }


 public function products()
  {
   $products = Product::all();
   return view('site.pages.rateDisplay',compact('products'));
  }


 public function productProduct(Request $request )
  {
    
   request()->validate(['rate' => 'required']);
   $product = Product::find($request->id);
  
   $rating = new \willvincent\Rateable\Rating;
   $rating->rating = $request->rate;
   $rating->user_id = auth()->user()->id;
   $product->ratings()->save($rating);
   return redirect()->back();
   //return redirect()->route("products");
  }
}