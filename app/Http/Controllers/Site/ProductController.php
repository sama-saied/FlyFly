<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;
use App\Models\Cartt;
use Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Cart_storage;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
{
    $this->productRepository = $productRepository;
    $this->attributeRepository = $attributeRepository;
}

  
    public function show($slug)
{
   
    $product = $this->productRepository->findProductBySlug($slug);
    $rate = \willvincent\Rateable\Rating::all();
    $attributes = $this->attributeRepository->listAttributes();

    $count= 0 ;

    foreach($rate as $rat){
       if($rat->rateable_id == $product->id)
         $count ++;
}
    return view('site.pages.product', compact('product', 'attributes','count'));


}

public function addToCart(Request $request)
{
    $product = $this->productRepository->findProductById($request->input('productId'));
    $options =  $request->except('_token', 'productId', 'price', 'qty','productImg','key');

    if(Auth::check())
 {
    Cartt::add($request->input('productId'), $product->name, $request->input('price'), 
    $request->input('qty'),$request->input('productImg'));

    $id = Cartt::getContents()->last();
    $i = $id->id;
   if($request->input('key'))
   {

       foreach($options as $key => $value )
       {
       Cartt::addattr($key,$value,$i);
       }
   }
 }
    else
    {
    Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty')
    ,$request->input('productImg'), $options);
    }

   

    return redirect()->back()->with('message', 'Item added to cart successfully.');
}

    public function index(Request $request)
    {
        return Product::filter($request)->get();
    }

   

   

}