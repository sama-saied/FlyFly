@extends('site.app')
@section('title', 'Sorry')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
           
        </div>
    </section>
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
                <main class="col-sm-12">
                    <p class="alert alert-success"> 
                        <b> We are Sorry the current quantity of the product {{$p->name}} is less than the quantity that you want to buy.<br>
                           We are working on providing more of it. Please, wait or reduce the quantity you want. </b></main>
                   </p>
                
                
            </div>
        </div>
    </section>
@stop