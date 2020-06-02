@extends('site.app')
@section('title', 'Profile Information')
@section('content')

<!-- Page info -->
<div class="page-top-info">
		<div class="container">
			<h4>Profile Informatio</h4>
			<div class="site-pagination">
				<a href="/">Home</a> 
			</div>
		</div>
	</div>
    <!-- Page info end -->

    
        <section class="checkout-section spad">
		<div class="container">
			<div class="row">
            <div class="col-lg-8 order-2 order-lg-1">
           
                   
                            <form class="checkout-form" action="{{ route('profile.edit' , $user->id) }}" method="POST" role="form">
                            <center>
                            @csrf
                                <div class="row address-inputs">
                                  <div class="col-md-6">
                                        
                                        <input type="text" placeholder="First name" class="form-control @error('first_name') is-invalid @enderror" 
                                        name="first_name" id="first_name" for="first_name" value=" {{$user->first_name}}" enabled>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                      
                                        <input type="text" for="last_name" placeholder="Last name"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{$user->last_name}}" enabled>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                
                                <div class="col-md-12">
                                   
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" for="email"
                                    name="email" id="email"placeholder="Email address" value="{{$user->email}}" enabled>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong> Inavlid E-mail </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                   
                                    <input type="password" for="password" placeholder="password"
                                     class="form-control @error('password') is-invalid @enderror" name="password" id="password"  value="{{$user->password}}" enabled>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    
                                    <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" 
                                    id="address" placeholder="address" value="{{$user->address}}" for="address" enabled>
                                </div>
                                <div class="col-md-6">
                                    
                                    <input class="form-control @error('phone_number') is-invalid @enderror" type="text" for="address" placeholder="Ph."
                                     name="phone_number" id="phone_number" value="{{$user->phone_number}}">
                                </div>  
                            
                                <div class="col-md-6">
                                       
                                        <input type="text" for="city" placeholder="City"
                                         class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{$user->city}}">
                                    </div>
                                    <div class="col-md-6">
                                        
                                    <input type="text" placeholder="Country" class="form-control @error('country') is-invalid @enderror"
                                     name="country" value="{{ $user->country }}" enabled>
                                    </div>
                                    </div>
                                    <button type="submit" class="site-btn submit-order-btn"> Edit </button>
                               
                              
                                </div>
                                </center>
                            </form>
                           
                    </div>
			</div>
          
        </section>
       

        
       
    
@endsection