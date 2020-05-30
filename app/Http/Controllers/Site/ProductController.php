<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;
use App\Models\Cartt;
//use App\Models\Cart;
use App\Models\Product;
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

    /*
    $cartt = new Cart_storage;
    $cartt->cart_id = $request->cart_id;
    $cartt->attribute_id = $request->attribute_id;
    $cartt->value = $request->value;
    $cartt->save();
*/
    $product = $this->productRepository->findProductById($request->input('productId'));
    $options =  $request->except('_token', 'productId', 'price', 'qty','productImg');
    
   /* $customAttributes = [
        'attr' => [
            'key' => $request->key,
            'value' => $request->value,
        ]
    ];
*/

  /*  $attr =  ['color' => 'red', 'size' => 'small'];

    if(count($attr) > 1)
        $count = count($attr);
    else return $attr;

    for($i = 0; $i < $count; $i++){
        $data = array(
            'attr' => $attr[$i],
        );

        $insertData[] = $data;
    }

    Cartt::insert($insertData);
*/

/*$attribute[] = array(
    'key' => array('required', 'unique:insur_docs,key_id'),
);
*/

/*for ($i = 1; $i < 5; $i++) {
    $answers[] = [
       
        'attr' => $request->attr[2],
         
    ];
}

   // Cartt::insert($answers);
*/

//$data['attr'] = $request->input('key');

/*$data = array(
    'product_id'      => $request->input('productId'),
    'name'   => $product->name,
    'price'    =>  $request->input('price'),
    'qty'    => $request->input('qty'),
    'img'    => $request->input('productImg'),
    'attr' => array('size' => 'small', 'color' => 'Red')
);

Cartt::add($data);
*/

/*$cartt = new Cart_storage;
$cartt->cart_id = $request->cart_id;
$cartt->key_name = $request->key_name;
$cartt->value = $request->value;
$cartt->save();
*/

$cartt = new Cart_storage;
$cartt->cart_id = 17;
$cartt->key_name = 'color';
$cartt->value = 'red';
$cartt->save();

    Cartt::add($request->input('productId'), $product->name, $request->input('price'), 
    $request->input('qty'),$request->input('productImg'),$request->input('key')
  
    //$data['attr']
    //$answers
    //,['color' => 'red', 'size' => 'small']
   // $customAttributes
 /* $request->input(array(
    'attr' => array('required',attr_id'),
  ))
    */
 );

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

   

}