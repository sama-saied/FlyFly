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

     /**
     * get cart sub total
     * @param bool $formatted
     * @return float
     */
    public function getSubTotal($formatted = true)
    {
        $cart = $this->getContent();

        $sum = $cart->sum(function (ItemCollection $item) {
            return $item->getPriceSumWithConditions(false);
        });

        // get the conditions that are meant to be applied
        // on the subtotal and apply it here before returning the subtotal
        $conditions = $this
            ->getConditions()
            ->filter(function (CartCondition $cond) {
                return $cond->getTarget() === 'subtotal';
            });

        // if there is no conditions, lets just return the sum
        if (!$conditions->count()) return Helpers::formatValue(floatval($sum), $formatted, $this->config);

        // there are conditions, lets apply it
        $newTotal = 0.00;
        $process = 0;

        $conditions->each(function (CartCondition $cond) use ($sum, &$newTotal, &$process) {

            // if this is the first iteration, the toBeCalculated
            // should be the sum as initial point of value.
            $toBeCalculated = ($process > 0) ? $newTotal : $sum;

            $newTotal = $cond->applyCondition($toBeCalculated);

            $process++;
        });

        return Helpers::formatValue(floatval($newTotal), $formatted, $this->config);
    }

    /**
     * the new total in which conditions are already applied
     *
     * @return float
     */
    public function getTotal()
    {
        $subTotal = $this->getSubTotal(false);

        $newTotal = 0.00;

        $process = 0;

        $conditions = $this
            ->getConditions()
            ->filter(function (CartCondition $cond) {
                return $cond->getTarget() === 'total';
            });

        // if no conditions were added, just return the sub total
        if (!$conditions->count()) {
            return Helpers::formatValue($subTotal, $this->config['format_numbers'], $this->config);
        }

        $conditions
            ->each(function (CartCondition $cond) use ($subTotal, &$newTotal, &$process) {
                $toBeCalculated = ($process > 0) ? $newTotal : $subTotal;

                $newTotal = $cond->applyCondition($toBeCalculated);

                $process++;
            });

        return Helpers::formatValue($newTotal, $this->config['format_numbers'], $this->config);
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

}