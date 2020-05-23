@extends('site.app')
@section('title', 'Shopping Cart')
@section('cart')

@if($bool == true)

{{ $num ?? '' }}


@foreach($carts ?? '' as $cart)
@if($cart->user_id == auth()->user()->id)
{{$cart->name}}


<div class="btn-group" role="group" aria-label="Second group">
     
      <a href="{{ route('cart.delete', [$cart->id , auth()->user()->id]) }}"
       class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

      

             @endif
             <a href="{{ route('cart.clear', $cart->user_id) }}"
       class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
       </div>
@endforeach

@else

<p>your cart is empty</p>


       @endif 
                                   
@stop