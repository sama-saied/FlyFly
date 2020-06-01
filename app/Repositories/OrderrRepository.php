<?php
namespace App\Repositories;

use App\Models\Order;
use App\Models\Cartt;
use App\Models\Product;
use App\Models\OrderItem;
use App\Contracts\OrderContract;

class OrderrRepository extends BaseRepository implements OrderContract
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
{
    return $this->all($columns, $order, $sort);
}

public function findOrderByNumber($orderNumber)
{
    return Order::where('order_number', $orderNumber)->first();
}






}