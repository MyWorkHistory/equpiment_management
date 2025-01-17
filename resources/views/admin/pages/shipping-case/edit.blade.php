@extends('admin.layout.app')
@section('style')
 
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-lg-9 mx-auto">
        <div class="card radius-15">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="mb-0">Edit Shipping Case</h4>
                </div>
                <hr/>
               
                <form method="POST" action="{{ route('admin.shipping-cases.update',$ship->id) }}">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())  
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                            @foreach ($errors->all() as $error)
                                
                                <li> {{ $error }}</li>   
                                 
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-body">                   
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Manufacture</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('manufacture') is-invalid @enderror"
                                     name="manufacture" value="{{ $ship->manufacture }}" placeholder="Please input manufacture" autofocus>
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Model Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('model_number') is-invalid @enderror"
                                     name="model_number" value="{{ $ship->model_number }}" placeholder="Please input model number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Serial Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('serial_number') is-invalid @enderror"
                                     name="serial_number" value="{{ $ship->serial_number }}" placeholder="Please input serial number">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Asset Tag</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('asset_tag') is-invalid @enderror"
                                     name="asset_tag" value="{{ $ship->asset_tag }}" placeholder="Please input asset tag">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-danger px-4">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
 
<script>
    
   
</script>
@endsection