@extends('admin.app')

@section('title') {{ $pageTitle }} @endsection

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
                        <b> This page is accessible only to the super admins. You cannot access it. </b></main>
                   </p>
                
                
            </div>
        </div>
    </section>
@stop