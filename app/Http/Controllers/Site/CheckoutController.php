<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use App\Services\PayPalService;
use App\Models\Order;
use Darryldecode\Cart\Facades\CartFacade;
use  darryldecode\Cart\Cart;

class CheckoutController extends Controller
{
    protected $orderRepository;
    protected $payPal;

    public function __construct(OrderContract $orderRepository, PayPalService $payPal)
{
    $this->payPal = $payPal;
    $this->orderRepository = $orderRepository;
}

    public function getCheckout()
    {
        if (\Cart::isEmpty()){
            return redirect()->back()->with('message', 'Cart Is Empty.');
        }
        
        else
        {
        return view('site.pages.checkout');}
    }
    

    public function placeOrder(Request $request)
{
    // Before storing the order we should implement the
    // request validation which I leave it to you

  /*  $this->validate($request, [
        'first_name'   => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'address' => 'required',
        'country' => 'required',
        'city' => 'required',
        'post_code' => 'required',
        'phone_number' => ['required','max:11','min:11'],
        'email' => ['required', 'string', 'email', 'max:255','unique:users'],
    ]);

    $order = $this->orderRepository->storeOrderDetails($request->all());

    // You can add more control here to handle if the order
    // is not stored properly
    if ($order) {
        $this->payPal->processPayment($order);
    }

    return redirect()->back()->with('message','Order not placed');
*/
    // Before storing the order we should implement the
    // request validation which I leave it to you
    $order = $this->orderRepository->storeOrderDetails($request->all());

    // You can add more control here to handle if the order
    // is not stored properly
   /* if ($order)
    {
        $this->payPal->processPayment($order);

    }
*/

Cart::clear();



return view('site.pages.success', compact('order'));

//return redirect()->back()->with('message','Order not placed yet');
}

public function complete(Request $request)
{
    $paymentId = $request->input('paymentId');
    $payerId = $request->input('PayerID');

    $status = $this->payPal->completePayment($paymentId, $payerId);

    $order = Order::where('order_number', $status['invoiceId'])->first();
    $order->status = 'processing';
    $order->payment_status = 1;
    $order->payment_method = 'PayPal -'.$status['salesId'];
    $order->save();

    Cart::clear();
    return view('site.pages.success', compact('order'));
}

}