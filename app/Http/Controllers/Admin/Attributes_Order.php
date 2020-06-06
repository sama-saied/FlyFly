<?php

namespace App\Http\Controllers\Admin;

use App\Models\attribute_order;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class Attributes_Order extends Controller
{
    public function Attribute(Request $request)
    {
       // $orderAttribute = attribute_order::create($request->data);
        //OR
        $orderAttribute = new attribute_order;
        $orderAttribute->order_id = $request->order_id;
        $orderAttribute->key_name = $request->key_name;
        $orderAttribute->value = $request->value;

       $orderAttribute->save();
       return redirect()->back();     
    }

}