<?php


namespace App\Models;
//use Illuminate\Database\Eloquent\Model;

//class Cart extends Model
class Cart
{
   public $items = [];
   public $totalQty ;
   public $totalPrice ;

   public function __Construct($cart = null)
   {
       if($cart)
       {
           $this->items = $cart->items;
           $this->totalQantity = $cart->totalQantity;
           $this->totalPrice = $cart->totalPrice;
       }
       else
       {
        $this->items = [];
        $this->totalQantity = 0;
        $this->totalPrice = 0;
       }
   }

   public function add($product)
   {
      /* $storedItem = ['quantity'=>0 , 'price' =>$item->price , 'item'=>$item];
       if($this->$items)
       {
           if(array_key_exists($id , $this->items))
           {
               $storedItem = $this->items[$id];
           }
       }
       $storedItem['quantity']++;
       $storedItem['price'] = $item->price * $storedItem['quantity'];
       $this->items[$id] = $storedItem;
       $this->totalQantity++;
       $this->totalPrice += $item->price;
   }
*/

$item =[
    'name' => $product->name,
    'price' => $product->price,
   // 'sale_price' => $product->sale_price,
    'quantity' => 0 ,
];

if(array_key_exists($product->id , $this->items))
{
    $this->items[$product->id] = $item ;
    $this->totalQantity += 1 ;
  //  if($product->sale_price)
  //  {
  //  $this->totalPrice += $product->sale_price;
  //  }
  //  else
   // {
        $this->totalPrice += $product->price;
   // }
}
else
{
    $this->totalQantity += 1 ;
   // if($product->sale_price)
 //   {
  //  $this->totalPrice += $product->sale_price;
   // }
  //  else
  //  {
        $this->totalPrice += $product->price;
  //  }
}
$this->items[$product->id]['quantity'] += 1;
}
}