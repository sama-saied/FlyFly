@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Users</h4>
                    <p><b> {{$users = App\Models\User::count()}}</b></p>
                </div>
            </div>
        </div>
       
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-briefcase fa-3x " ></i>
                <div class="info">
                    <h4>Products</h4>
                    <p><b>{{$products = App\Models\Product::count()}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-tags fa-3x"></i>
                <div class="info">
                    <h4>Categories</h4>
                    <p><b>{{$categories = App\Models\Category::count()}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon">
                <!--<i class="icon fa fa-briefcase fa-3x"></i>-->
                <i class="icon fa fa-info-circle fa-3x"></i>
                <div class="info">
                    <h4>Brands</h4>
                    <p><b>{{$brands = App\Models\Brand::count()}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
                <i class= "icon fa fa-bar-chart fa-3x"></i>
                <div class="info">
                    <h4>Orders</h4>
                    <p><b>{{$orders = App\Models\Order::count()}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon" >
                <i class= "icon fa fa-comments fa-3x" ></i>
                <div class="info" >
                    <h4>Comments</h4>
                    <p><b>{{$comments = App\Models\Comment::count()}}</b></p>
                </div>
            </div>
        </div>
       
       
    </div>
@endsection