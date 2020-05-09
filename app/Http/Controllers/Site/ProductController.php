<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;
use Cart;
//use App\Models\Cart;
use App\Models\Product;
use Session;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
{
    $this->productRepository = $productRepository;
    $this->attributeRepository = $attributeRepository;
}

   /* public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);

        dd($product);
    }
*/
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
    $options = $request->except('_token', 'productId', 'price', 'qty');
    Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);
    return redirect()->back()->with('message', 'Item added to cart successfully.');
}

public function index(Request $request)
    {
        return Product::filter($request)->get();
    }

   /* public function getAddToCart(Request $request , $id)
    {
       // $product = Product::find($id);
        $product = $this->productRepository->findProductById($request->input('productId'));
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product , $product->id);

        $request->session()->put('cart' , $cart);
        
        dd($request->session()->get('cart'));
       
       // return redirect()->route('product.show');

    }*/

    public function getAddToCart(Product $product )
    {
        if(session()->has('cart'))
        {
            $cart = new Cart(session()->get('cart'));
        }
        else
        {
            $cart = new Cart();
        }
        $cart->add($product);
        dd($cart);
       // return redirect()->route('product.show');

    }

}