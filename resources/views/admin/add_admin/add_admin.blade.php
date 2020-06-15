@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-user fa-lg fa-1x"></i> {{ $pageTitle }} - {{ $subTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                
                <form action="{{ route('admin.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="email">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" type="text" name="name" id="name" required=""/>
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" type="text" name="email" id="email" required=""/>
                        </div>  
                        
                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="password">Password <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control" type="password" name="password" id="password" required=""/>
                            </div> 
                        
                                <div class="form-group">
                                    <label class="control-label" for="role">Role <span class="m-l-5 text-danger"> *</span></label>
                                    <select name="role" id="role" class="form-control">        
                                            <option> Choose...</option>
                                            <option value="Super Admin">Super Admin</option>
                                            <option value="Sub Admin">Sub Admin</option>                    
                                    </select>
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('admin_id') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                           
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Admin</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.view') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
@endsection