<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\OrderContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends BaseController
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
{
    $orders = $this->orderRepository->listOrders();
    $this->setPageTitle('Orders', 'List of all orders');
    return view('admin.orders.index', compact('orders'));
}

public function show($orderNumber)
{
    $order = $this->orderRepository->findOrderByNumber($orderNumber);

    $this->setPageTitle('Order Details', $orderNumber);
    return view('admin.orders.show', compact('order'));
}



public function edit($id)
{
    $order = $this->orderRepository->findOrderById($id);
    //$order=Order::where('id', $id)->first();
    $this->setPageTitle(' Status', 'Edit Status ');
    return view('admin.orders.edit', compact('order'));
}

public function update(Request $request)
{
   
    $params = $request->except('_token');

    $order = $this->orderRepository->updateOrder($params);

    if (!$order) {
        return $this->responseRedirectBack('Error occurred while updating order status.', 'error', true, true);
    }
    return $this->responseRedirect('admin.orders.index', 'Order Status updated successfully' ,'success',false, false);
}
}