<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;
use Cart;
use App\Models\Product;

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
    $attributes = $this->attributeRepository->listAttributes();

    return view('site.pages.product', compact('product', 'attributes'));
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

}