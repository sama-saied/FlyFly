@extends('site.app')
@section('title', 'Orders')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">My Account - Orders</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
            </div>
            <div class="row">
                <main class="col-sm-12">
                    <table class="table table-hover" >
                        <thead>
                            
                            <tr>
                                <th scope="col"> order number</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Order Price</th>
                                <th scope="col">Items Number</th>
                                <th scope="col">Status</th>
                            </tr>
                          
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td scope="row">{{ $order->order_number }}</td>
                                    <td scope="row">{{ $order->user->full_name }}</td>
                                    <td>{{ config('settings.currency_symbol') }}{{ round($order->grand_total, 2) }}</td>
                                    <td>{{ $order->item_count }}</td>
                                    <td><span class="badge badge-success">{{ strtoupper($order->status) }}</span></td>
                                </tr>
                            @empty
                                <div class="col-sm-12">
                                    <p class="alert alert-warning">No orders to display.</p>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </section>
@stop