@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')

<div class="app-title">  
    <div>
        <h1><i class="fa fa-user fa-lg fa-1x"></i> {{ $pageTitle }}</h1>
        <p>{{ $subTitle }}</p>
    </div>   
</div>

@include('admin.partials.flash')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Admin Name</th>
                            <th>Admin Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                            
                                <tr>
                                    <td> {{$admin->name}} </td>
                                    <td> {{$admin->role}} </td>
                                </tr>
                           
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush