<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use App\Services\PayPalService;
use App\Models\Order;
use Darryldecode\Cart\Facades\CartFacade;
use  Cart;
Use  App\Models\Product;
use  App\Models\Cartt;

class CheckouttController extends Controller
{
    protected $orderRepository;
    protected $ProductRepository;
    protected $payPal;

    public function __construct(OrderContract $orderRepository, PayPalService $payPal)
{
    $this->payPal = $payPal;
    $this->orderRepository = $orderRepository;
}

   
    

    public function getOrder()
    {
        $id = auth()->user()->id;
        if (Cartt::isEmpty($id) == false ){
            return redirect()->back()->with('message', 'Cart Is Empty.');
        }
        
        else
        {
            $carts = Cartt::all();
            $pro = Product::all();
            $total = Cartt::getTotal($id);
            
        return view('site.pages.checkouttDisplay',compact('carts','pro','total'));
        }
    }


    public function placeOrder(Request $request)
{
   
    $order = $this->orderRepository->storeOrderDettails($request->all());

    $id = auth()->user()->id;

    Cartt::ClearCart($id);

return view('site.pages.success', compact('order'));
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
    $id = auth()->user()->id;

    Cartt::ClearCart($id);
    return view('site.pages.success', compact('order'));
}

}