@extends('site.app')
@section('title', 'Not Available')
@section('content')
   
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
                <main class="col-sm-12">
				<p class="alert alert-success"> Sorry, {{$categoryy->name}} Category is a parent category . it is not available page </p></main>
            </div>
        </div>
    </section>
@stop