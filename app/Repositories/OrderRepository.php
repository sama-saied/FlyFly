<?php
namespace App\Repositories;

use Cart;
use App\Models\Order;
use App\Models\Cartt;
use App\Models\attribute_order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Contracts\OrderContract;

class OrderRepository extends BaseRepository implements OrderContract
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDettails($params)
{
    $order = Order::create([
        'order_number'      =>  'ORD-'.strtoupper(uniqid()),
        'user_id'           => auth()->user()->id,
        'status'            =>  'pending',
        'grand_total'       =>  Cartt::getTotal(auth()->user()->id),
        'item_count'        =>  Cartt::Counter(auth()->user()->id),
       // 'payment_status'    =>  1,
       // 'payment_method'    =>  null,
        'first_name'        =>  $params['first_name'],
        'last_name'         =>  $params['last_name'],
        'address'           =>  $params['address'],
        'city'              =>  $params['city'],
        'country'           =>  $params['country'],
        'post_code'         =>  $params['post_code'],
        'phone_number'      =>  $params['phone_number'],
        'notes'             =>  $params['notes']
    ]);

    if ($order) {

        $items = Cartt::getContents();

        foreach ($items as $item)
        {
            if($item->user_id == auth()->user()->id)
            // A better way will be to bring the product id with the cart items
            // you can explore the package documentation to send product id with the cart
            {
            $product = Product::where('name', $item->name)->first();

            $orderItem = new OrderItem([
                'product_id'    =>  $product->id,
                'quantity'      =>  $item->qty,
                'price'         =>  $item->getTotal(auth()->user()->id)
            ]);

            $order->items()->save($orderItem);
            

            $i = Cartt::getContentt()->last();
            $id = $i->id;

            $attrs = Cartt::getattr();
        
            foreach($attrs as $attr)
            {
                if($item->id==$attr->cart_id)
               attribute_order::add($id,$attr->value,$attr->key_name);
            }
            
            $product->quantity = $product->quantity - $item->qty ;
            $product->save();
        }}
    }

    return $order;
}
    public function storeOrderDetails($params)
{
    $order = Order::create([
        'order_number'      =>  'ORD-'.strtoupper(uniqid()),
        'user_id'           => auth()->user()->id,
        'status'            =>  'pending',
        'grand_total'       =>  Cart::getSubTotal(),
        'item_count'        =>  Cart::getTotalQuantity(),
       // 'payment_status'    =>  1,
      //  'payment_method'    =>  null,
        'first_name'        =>  $params['first_name'],
        'last_name'         =>  $params['last_name'],
        'address'           =>  $params['address'],
        'city'              =>  $params['city'],
        'country'           =>  $params['country'],
        'post_code'         =>  $params['post_code'],
        'phone_number'      =>  $params['phone_number'],
        'notes'             =>  $params['notes']
    ]);

    if ($order) {

        $items = Cart::getContent();

        foreach ($items as $item)
        {
            // A better way will be to bring the product id with the cart items
            // you can explore the package documentation to send product id with the cart
            $product = Product::where('name', $item->name)->first();

            $orderItem = new OrderItem([
                'product_id'    =>  $product->id,
                'quantity'      =>  $item->quantity,
                'price'         =>  $item->getPriceSum()
            ]);

            $order->items()->save($orderItem);
            
           
            $product->quantity = $product->quantity - $item->quantity ;
            $product->save();

        }
    }

    return $order;
}



public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
{
    return $this->all($columns, $order, $sort);
}

public function findOrderByNumber($orderNumber)
{
    return Order::where('order_number', $orderNumber)->first();
}

public function findOrderById(int $id)
{
    try {
        return $this->findOneOrFail($id);

    } catch (ModelNotFoundException $e) {

        throw new ModelNotFoundException($e);
    }
}

   public function updateOrder(array $params)
    {
        $order = $this->findOrderById($params['id']);

        $collection = collect($params)->except('_token');
        $status = $collection->has('status') ? 1 : 0;
        $merge = $collection->merge(compact('status'));

        $order->update($merge->all());
  
        return $order;
    }

    public function deleteOrder($id)
    {

        $order = $this->findOrderById($id);
        $items = OrderItem::all();

        $attr_order = attribute_order::all();

        foreach($items as $item)
{
     
    if($item->order_id == $id)
    {
        $product = Product::where('id', $item->product_id)->first();
        $product->quantity = $product->quantity + $item->quantity ;
        $product->save();
    }  
    
    

    if($item->order_id == $id)
     {
    foreach($attr_order as $attr)
    {
        if($attr->order_item_id == $item->id)
  
        {
             $attr->delete();
      }
      }
     }
}
$order->delete();
return $order;
    
     /*   foreach ($items as $item)
        {
           

            if($item->order_id == $id)
            {
            $product = Product::where('id', $item->product_id)->first();
            $product->quantity = $product->quantity + $item->quantity ;
            $product->save();
            }
        }*/
       

        
    }



}