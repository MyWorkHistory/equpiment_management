@extends('admin.layout.app')
@section('style')
 
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-lg-9 mx-auto">
        <div class="card radius-15">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="mb-0">Add Type of Equipment</h4>
                </div>
                <hr/>
               
                <form method="POST" action="{{ route('admin.equipment-types.store') }}">
                    @csrf
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
                            <label class="col-sm-2 col-form-label">Type of Equipment</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('type_name') is-invalid @enderror"
                                     name="type_name" value="{{ old('type_name') }}" placeholder="Please input Type of Equipment" autofocus>
                            </div>
                        </div>                         
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-danger px-4">Create</button>
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