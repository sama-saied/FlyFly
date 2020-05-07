@extends('site.app')
@section('rate')
@foreach($products as $product)
{{$product->name}}
@endforeach
@stop