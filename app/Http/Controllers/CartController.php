<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
    {
        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'sale_price' => $product->sale_price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

       //dd($product);

        return redirect()->route('cart.index');

    }

    public function index()
    {

        $cartItems = \Cart::session(auth()->id())->getContent();
       // return view('cart.index', compact('cartItems'));
        return view('site.pages.cart', compact('cartItems'));
    }

    public function removeItem($id)
{
    Cart::remove($id);

    if (Cart::isEmpty()) {
        return redirect('/');
    }
    return redirect()->back()->with('message', 'Item removed from cart successfully.');
}

   /* public function destroy($itemId)
    {

       \Cart::session(auth()->id())->remove($itemId);

        return back();
    }
*/

    /*public function checkout()
    {
        return view('cart.checkout');
    }
*/
    public function applyCoupon()
    {
        $couponCode = request('coupon_code');

        $couponData = Coupon::where('code', $couponCode)->first();

        if(!$couponData) {
            return back()->withMessage('Sorry! Coupon does not exist');
        }


        //coupon logic
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $couponData->name,
            'type' => $couponData->type,
            'target' => 'total',
            'value' => $couponData->value,
        ));

        Cart::session(auth()->id())->condition($condition); // for a speicifc user's cart


        return back()->withMessage('coupon applied');

    }
}