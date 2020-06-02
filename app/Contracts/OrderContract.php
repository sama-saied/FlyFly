<?php
namespace App\Contracts;

interface OrderContract
{
    public function storeOrderDetails($params);
    public function storeOrderDettails($params);

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findOrderByNumber($orderNumber);

    
    public function findOrderById(int $id);

    public function updateOrder(array $params);

    public function deleteOrder($id);
    
}