@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-bar-chart"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    @include('admin.partials.flash')
    
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                
                <form action="{{ route('status.edit' , ['id' => $order->id]) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">

    <div class="form-group">
        <label class="control-label" for="status">Status </label>
        <select name="status" id="status" class="form-control">        

                <option value="pending"> pending </option>
                <option value="processing"> processing </option>  
                <option value="completed"> completed </option>
        </select>
        <div class="invalid-feedback active">
            <i class="fa fa-exclamation-circle fa-fw"></i> @error('order_id') <span>{{ $message }}</span> @enderror
        </div>
    </div>

<div class="tile-footer">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Status</button>
                        &nbsp;&nbsp;&nbsp;
 <a class="btn btn-secondary" href="{{ route('admin.orders.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>

</div>
</form>
</div>
</div>
</div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush

