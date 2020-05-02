@extends('site.app')
@section('title', 'Profile Information')
@section('content')
    <div class="container">
        <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>

            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row justify-content-center">

            <div class="profile-header-container">
                
                   
                    <div class="rank-label-container">
                     
                            <header class="card-header">
                        <h4 class="card-title mt-2" style="text-align:center">Profile Information</h4>
                    </header>
                           <article class="card-body">
                            <form action="{{ route('profile.edit' , $user->id) }}" method="POST" role="form">
                                @csrf
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="first_name">First name</label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value=" {{$user->first_name}}">
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col form-group">
                                        <label for="last_name">Last name</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{$user->last_name}}">
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$user->email}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong> Inavlid E-mail </strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"  value="{{$user->password}}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input class="form-control" type="text" name="address" id="address" value="{{$user->address}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address">Phone Number</label>
                                    <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{$user->phone_number}}">
                                </div>  
                            </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" name="city" id="city" value="{{$user->city}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="country">Country</label>
                                        <select id="country" class="form-control" name="country" value="{{$user->country}}">
                                            <option> Choose...</option>
                                            <option value="Egypt" selected>Egypt</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="United Emarats">United Emarats</option>                              
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block"> Edit </button>
                                </div>
                            </form>
                        </article>
                    </div>
                
            </div>

        </div>
       
    </div>
@endsection