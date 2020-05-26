<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Cartt extends Model 
{
    protected $table = 'cart';


    protected $fillable = [
        'user_id','name','qty','product_id','price','img'    ];

/**
     * add item to the cart, it can be an array or multi dimensional array
     *
     * @param string|array $id
     * @param string $name
     * @param float $price
     * @param int $quantity
     * @param text $productImg
     * @param array $attributes
     * @param CartCondition|array $conditions
     * @param string $associatedModel
     * @return $this
     * @throws InvalidItemException
     */
    public static function add($id, $name = null, $price = null, $quantity = null,$productImg = null)
    {

       $cart = new self();

        $cart->user_id = Auth::user()->id;
        $cart->product_id = $id;
        $cart->name = $name;
        $cart->price = $price;
        $cart->qty = $quantity;
        $cart->img = $productImg;
        $cart->key = 'sama';
        $cart->value = 'sama';

        $cart->save();

    }
     
    public static function getTotal($id)
    {
        $count = 0;
        $carts = Cartt::all();
        $pros = Product::all();
        foreach($carts as $cart)
        {
            if($cart->user_id == $id)
          foreach($pros as $pro){
              if($pro->id == $cart->product_id)
                {
                    if($pro->sale_price)
                    $count += $pro->sale_price;
                    else
                 $count += $pro->price;
                }
        }
        }

       return $count;
    }

    /**
     * get total quantity of items in the cart
     *
     * @return int
     */
    public function getTotalQuantity()
    {
        $items = $this->getContent();

        if ($items->isEmpty()) return 0;

        $count = $items->sum(function ($item) {
            return $item['quantity'];
        });

        return $count;
    }

    /**
     * check if cart is empty
     *
     * @return bool
     */
    public static function isEmpty($id)
    {
        $count = 0;
        $carts = Cartt::all();
        foreach($carts as $cart)
        {
            if($cart->user_id == $id)
            $count++;
        }
        
        if($count > 0)
        $b = true;
        else
        $b = false;

        return $b;
    }

    
    public function  user()
    {
        return $this->belongsTo(User::class);
    }

    public static function Counter($id)
    {
       $carts = Cartt::all();
       $count=0;
       foreach($carts as $cart)
       {
           if($cart->user_id == $id)
           $count++;
       }
       return $count;
    }


    public static function getContent($id)
    {
        $carts = Cartt::all();
        $pro = Product::all();
        $total = Cartt::getTotal($id);
       return [$carts,$pro,$total];
    }
}